<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Blogcategor;
use App\Productimage;
use App\Productprice;
use App\Productoptiontypemap;
use App\Ordercart;
use App\Cartoptionmap;
use App\Productwishlist;
use App\Coupon;
use App\Producttax;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class BlogCartController extends Controller
{
    public function getCartPage()
    {
        $pageName = 'cart';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $customerId = Auth::guard('customer')->id();

        $cartList = Ordercart::select('ordercarts.id','quantity','productCost','couponCode','products.id AS productId','productDisplayId','productName','productNameSlug','shortDescription','price','productprices.currency','discount','finalPrice','taxCategoryId','couponStatus','ordercarts.created_at')
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
            return view('blog.blog-empty-cart')->with([
                'seo' => $seo,
                'category' => $category,
            ]);
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
            $tax = $tax + ( $this->setTax($temp->finalPrice, $temp->taxCategoryId) * $temp->quantity );

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
            
            $cartImage[$temp->id] = Productimage::select('imageName')->where('productId', $temp->productId)->limit(1)->get();

            $cartOption[$temp->id] = Cartoptionmap::select('cartoptionmaps.id','cartoptionmaps.productId','cartoptionmaps.optionTypeId','cartoptionmaps.cartId','productoptiontypemaps.optionId','optionName','optionTypeName')
                                ->join('productoptiontypemaps', function($join){
                                    $join->on('productoptiontypemaps.optionTypeId','cartoptionmaps.optionTypeId')
                                         ->on('productoptiontypemaps.productId','cartoptionmaps.productId');})
                                ->join('productoptiontypes', 'productoptiontypes.id','productoptiontypemaps.optionTypeId')
                                ->join('productoptions', 'productoptions.id','productoptiontypemaps.optionId')
                                ->where('cartId', $temp->id)
                                ->get();
        }

        $discount = $price - $discountPrice;
        $deliveryCharge = $this->setDeliveryCharge($currency);
        $totalPrice = $discountPrice + $tax + $deliveryCharge - $couponDiscount;

        return view('blog.blog-cart')->with([
            'seo' => $seo,
            'category' => $category,
            'cartList' => $cartList,
            'cartImage' => $cartImage,
            'price' => $price,
            'discount' => $discount,
            'couponDiscount' => $couponDiscount,
            'tax' => $tax,
            'deliveryCharge' => $deliveryCharge,
            'totalPrice' => $totalPrice,
            'currency' => $currency,
            'cartOption' => $cartOption,
        ]);
    }

    protected function setTax($discountPrice, $taxCategoryId)
    {
        $taxRate = Producttax::select('id','taxCategory','taxRate')->where('id', $taxCategoryId)->get();

        foreach ($taxRate as $temp) {
            $percentTax = $temp->taxRate;
        }
        $tax = $discountPrice * ($percentTax/100);

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
            $deliveryCharge = 0;
        } elseif ($currency == 'eur') {
            $deliveryCharge = 2;
        } elseif ($currency == 'gbp') {
            $deliveryCharge = 3;
        } else {
            $deliveryCharge = 2;
        }
        return $deliveryCharge;
    }

    public function ajaxRemoveFromCart(Request $request)
    {
        $ordercart = Ordercart::find($request->input('removeId'));

        $ordercart->delete();
        return response()->json([
            'status' => 'Success',
            'message' => 'Your Product Removed Successfully.'
        ], 201);
    }

    public function ajaxAddToWishlist(Request $request)
    {
        $customerId = Auth::guard('customer')->id();
        $productwishlist = Productwishlist::firstOrNew(['productId' => $request->input('productId'), 'customerId' => $customerId]);

        $productwishlist->productId = $request->input('productId');
        $productwishlist->customerId = $customerId;
        $productwishlist->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Your Product Added to Wishlist.'
        ], 201);
    }

    public function ajaxRemoveFromWishlist(Request $request)
    {
        $blogauthor = Productwishlist::find($request->input('id'));
        $blogauthor->delete();

        return response()->json(['message' => 'Product Removed From Wishlist Successfully.', 200]);
    }

    public function ajaxCartQuantity(Request $request)
    {
        $ordercart = Ordercart::find($request->input('cartId'));

        $ordercart->quantity = $request->input('quantity');
        $ordercart->update();

        return \App::make('redirect')->refresh();
    }

    public function ajaxSaveCouponCode(Request $request)
    {
        $this->validate($request, [
            'coupon' => 'required',
        ]);

        $couponCode = $request->input('coupon');
        $customerId = Auth::guard('customer')->id();

        $couponData = Coupon::select('status')->where('couponCode', $couponCode)->get();

        foreach($couponData as $temp) {
            $couponStatus = $temp->status;
        }

        if ($couponStatus == 'ACTIVE') {
            $ordercart = Ordercart::where('customerId', $customerId)->where('status', 'ACTIVE')->update(['couponCode' => $couponCode]);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Your Coupon Added to Cart.'
        ], 201);
    }
}
