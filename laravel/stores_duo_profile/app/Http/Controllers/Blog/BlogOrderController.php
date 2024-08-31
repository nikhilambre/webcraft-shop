<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Blogcategor;
use App\Ordercart;
use App\Carbon;
use App\Order;
use App\Orderaddr;
use App\Coupon;
use App\Customer;
use Auth;

class BlogOrderController extends Controller
{
    public function getOrderPage()
    {
        $pageName = 'order';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $customerId = Auth::guard('customer')->id();

        $cartList = Ordercart::select('ordercarts.id','quantity','productCost','couponCode','products.id AS productId','productDisplayId','productName','productNameSlug','shortDescription','price','productprices.currency','discount','finalPrice','couponStatus','ordercarts.created_at')
                                ->join('products', 'products.id','ordercarts.productId')
                                ->join('productprices', function($join){
                                    $join->on('productprices.productId','ordercarts.productId')
                                         ->on('ordercarts.currency', 'productprices.currency');})
                                ->where('ordercarts.status', 'ACTIVE')
                                ->where('customerId', $customerId)
                                ->get();
        
        $tax = 0;
        $price = 0;
        $discountPrice = 0;
        $couponDiscount = 0;

        if($cartList->isEmpty()) {
            return redirect()->route('blog.shop');
        }

        foreach ($cartList as $temp) {
            $couponCode = $temp->couponCode;

            if ($couponCode == null) {
                $noCoupon = true;

            } else {
                $noCoupon = false;
                $couponData = Coupon::select('id','couponCode','couponPercentage','couponAmount','status','couponType')
                                        ->where('couponCode', $couponCode)
                                        ->get();

                foreach ($couponData as $temp1) {
                    $temp1->couponPercentage;
                    
                    if ($temp1->couponPercentage != null) {
                        $discountValue = $temp1->couponPercentage;
                        $discountType = 'percentage';
                    }
                    if ($temp1->couponAmount != null) {
                        $discountValue = $temp1->couponAmount;
                        $discountType = 'amount';
                    }
                }
            }
            break;
        }

        foreach ($cartList as $temp) {
            $price = $price + ($temp->price * $temp->quantity);
            $tax = $tax + ( $this->setTax($temp->finalPrice) * $temp->quantity );

            $discountPrice = $discountPrice + ($temp->finalPrice * $temp->quantity);
            $currency = $temp->currency;

            //  Add Coupons discount if coupon is applicable for product and cart has couponCode Saved
            if ($temp->couponStatus == 'Applicable' && $noCoupon == false) {

                $discountSet = $this->setCouponDiscount($temp->finalPrice, $discountValue, $discountType);
                $couponDiscount = $couponDiscount + ($discountSet  * $temp->quantity );

                $updatePriceToCart = $temp->finalPrice - $discountSet;

                //  Update Price in Cart which is actual Paid Price by User
                $ordercart = Ordercart::where('customerId', $customerId)
                                    ->where('status', 'ACTIVE')
                                    ->where('productId', $temp->productId)->update(['productCost' => $updatePriceToCart]);
            }
        }

        $discount = $price - $discountPrice;
        $deliveryCharge = $this->setDeliveryCharge($currency);
        $totalPrice = $discountPrice + $tax + $deliveryCharge - $couponDiscount;

        //  Customer Details
        $customer = Customer::select('customers.id','name','lastname','email','contact_no','customerImgName','addrText','addrCity','addrState','addrCountry','addrPincode','customers.created_at')
                                ->join('customeraddrs', 'customeraddrs.customerId','customers.id')
                                ->where('customers.id', $customerId)
                                ->get();

        return view('blog.blog-order')->with([
            'seo' => $seo,
            'category' => $category,
            'cartList' => $cartList,
            'price' => $price,
            'discount' => $discount,
            'couponDiscount' => $couponDiscount,
            'tax' => $tax,
            'deliveryCharge' => $deliveryCharge,
            'totalPrice' => $totalPrice,
            'currency' => $currency,
            'customer' => $customer,
        ]);
    }

    protected function setTax($discountPrice)
    {
        if ($discountPrice < 1000) {
            $percentTax = 5/100;
            $tax = $discountPrice * $percentTax;

        } elseif ($discountPrice >= 1000) {
            $percentTax = 12/100;
            $tax = $discountPrice * $percentTax;
        }
        return $tax;
    }

    protected function setCouponDiscount($discountPrice, $value, $type)
    {
        if ($type == 'percentage') {
            $per = $value/100;
            $discount = $discountPrice * $per;

        } elseif ($type == 'amount') {
            $discount = $value;
        }
        return $discount;
    }

    protected function setDeliveryCharge($currency)
    {
        if ($currency == 'usd'){
            $deliveryCharge = 2;
        } elseif ($currency == 'inr'){
            $deliveryCharge = 'FREE';
        } elseif ($currency == 'eur') {
            $deliveryCharge = 2;
        } elseif ($currency == 'gbp') {
            $deliveryCharge = 3;
        } else {
            $deliveryCharge = 2;
        }
        return $deliveryCharge;
    }

    public function postOrderPage(Request $request)
    {
        $this->validate($request, [
            'orderName' => 'required|max:60',
            'orderEmail' => 'required|max:100',
            'orderContactNo' => 'required|max:22',
            'orderCurrency' => 'required|max:5',
            'orderCost' => 'required|number|max:11',
            'orderTerms' => 'required',

            'addrCity' => 'required|max:30',
            'addrState' => 'required|max:30',
            'addrCountry' => 'required|max:40',
            'addrText' => 'required|max:150',
            'addrPincode' => 'required|max:15',
        ]);

        $customerId = Auth::guard('customer')->id();

        //  Update cartCode field with unique and same number for all products in cart
        $cartList = Ordercart::where('customerId', $customerId)->where('status', 'ACTIVE')->get();
        $cartCode = abs(crc32(uniqid()));
        $cartList->cartCode = $cartCode;
        $cartList->update();

        //  Save Order data
        $order = new Order();
        
        $order->customerId = $customerId;
        $order->orderName = $request->input('orderName');
        $order->orderEmail = $request->input('orderEmail');
        $order->orderContactNo = $request->input('orderContactNo');
        $order->orderCurrency = $request->input('orderCurrency');
        $order->orderCost = $request->input('orderCost');
        $order->productId = $cartCode;
        $order->orderStatus = 'CREATED';
        $order->billingStatus = 'UNPAID';
        $order->deliveryStatus = 'PENDING';
        $order->orderTerms = 1;
        $order->save();

        //  Fetch saved order id
        $savedOrderId = $order->id;

        //  Save order Code and redirect page to order save success
        $order = Order::find($savedOrderId);
        $year = Carbon::now()->year;

        $zeros = str_pad($savedOrderId,6,'0',STR_PAD_LEFT);
        $orderCode = 'ORD'.$year.''.$zeros;

        $order->orderStatus = 'SAVED';
        $order->orderCode = $orderCode;
        $order->save();

        //  Save Order address now
        $orderaddr = new Orderaddr();

        $orderaddr->customerId = $customerId;
        $orderaddr->orderId = $savedOrderId;
        $orderaddr->addrType = 'DELIVERY';
        $orderaddr->addrCity = $request->input('addrCity');
        $orderaddr->addrState = $request->input('addrState');
        $orderaddr->addrCountry = $request->input('addrCountry');
        $orderaddr->addrText = $request->input('addrText');
        $orderaddr->addrPincode = $request->input('addrPincode');
        $orderaddr->save();

        return redirect()->route('blog.payment');
    }

}
