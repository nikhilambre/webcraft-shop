<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Auth;
use DB;
use Session;
use App\Order;
use App\Orderaddr;
use App\Orderchoice;
use App\Ordercomment;
use App\Orderdata;

class OrderManageController extends Controller
{
    protected function setCost($currency)
    {
        if ($currency == 'USD'){
            $this->currencyIcon = 'dollar-sign';
            $this->cost3600 = 5;
            $this->cost5000 = 7.5;
            $this->cost6000 = 9;
            $this->cost8000 = 11;
            $this->cost9000 = 12;
            $this->cost10000 = 14;
            $this->cost12000 = 17;
            $this->cost18000 = 25;

        } elseif ($currency == 'INR'){
            $this->currencyIcon = 'rupee-sign';
            $this->cost3600 = 299;
            $this->cost5000 = 419;
            $this->cost6000 = 499;
            $this->cost8000 = 666;
            $this->cost9000 = 749;
            $this->cost10000 = 833;
            $this->cost12000 = 999;
            $this->cost18000 = 1499;

        } elseif ($currency == 'EUR') {
            $this->currencyIcon = 'euro-sign';
            $this->cost3600 = 4.55;
            $this->cost5000 = 5.69;
            $this->cost6000 = 6.82;
            $this->cost8000 = 9.10;
            $this->cost9000 = 10.24;
            $this->cost10000 = 11.37;
            $this->cost12000 = 13.65;
            $this->cost18000 = 20.47;

        } elseif ($currency == 'GBP') {
            $this->currencyIcon = 'pound-sign';
            $this->cost3600 = 4;
            $this->cost5000 = 5;
            $this->cost6000 = 6;
            $this->cost8000 = 8;
            $this->cost9000 = 9;
            $this->cost10000 = 10;
            $this->cost12000 = 12;
            $this->cost18000 = 18;

        } else {
            $this->currencyIcon = 'dollar-sign';
            $this->cost3600 = 5;
            $this->cost5000 = 7.5;
            $this->cost6000 = 8.4;
            $this->cost8000 = 10.4;
            $this->cost9000 = 11.5;
            $this->cost10000 = 13;
            $this->cost12000 = 15;
            $this->cost18000 = 23;
        }

        return $this;
    }

    protected function getOrderCost($currency)
    {
        if ($currency == 'USD'){
            $this->currencyIcon = 'dollar-sign';
            $this->cost3600 = 60;
            $this->cost5000 = 90;
            $this->cost6000 = 100;
            $this->cost8000 = 125;
            $this->cost9000 = 138;
            $this->cost10000 = 150;
            $this->cost12000 = 180;
            $this->cost18000 = 275;

        } elseif ($currency == 'INR'){
            $this->currencyIcon = 'rupee-sign';
            $this->cost3600 = 3600;
            $this->cost5000 = 5000;
            $this->cost6000 = 6000;
            $this->cost8000 = 8000;
            $this->cost9000 = 9000;
            $this->cost10000 = 10000;
            $this->cost12000 = 12000;
            $this->cost18000 = 18000;

        } elseif ($currency == 'EUR') {
            $this->currencyIcon = 'euro-sign';
            $this->cost3600 = 54;
            $this->cost5000 = 68;
            $this->cost6000 = 81;
            $this->cost8000 = 109;
            $this->cost9000 = 122;
            $this->cost10000 = 136;
            $this->cost12000 = 163;
            $this->cost18000 = 245;

        } elseif ($currency == 'GBP') {
            $this->currencyIcon = 'pound-sign';
            $this->cost3600 = 48;
            $this->cost5000 = 60;
            $this->cost6000 = 72;
            $this->cost8000 = 96;
            $this->cost9000 = 108;
            $this->cost10000 = 120;
            $this->cost12000 = 144;
            $this->cost18000 = 216;

        } else {
            $this->currencyIcon = 'dollar-sign';
            $this->cost3600 = 60;
            $this->cost5000 = 90;
            $this->cost6000 = 100;
            $this->cost8000 = 125;
            $this->cost9000 = 138;
            $this->cost10000 = 150;
            $this->cost12000 = 180;
            $this->cost18000 = 275;
        }

        return $this;
    }

    public function listOrder()
    {
        $customerId = Auth::guard('customer')->id();

        $orders = Order::select('id','orderCode','orderCurrency','orderCost','productCode','orderStatus','created_at')
                        ->where('orderStatus', '<>' , 'DELETED')
                        ->where('orderStatus', '<>' , 'CRAFTED')
                        ->where('orderStatus', '<>' , 'CREATED')
                        ->where('customerId', $customerId)
                        ->get();

        return view('user.order-list')->with([
            'orders' => $orders
        ]);

    }

    public function getOrderUpdatePage($orderId, $setCurrency = null)
    {
        $customerId = Auth::guard('customer')->id();

        $orders = Order::select('orders.id','orderCode','orderName','orderOrgName','orderEmail','orderContactNo','orderCurrency','orderCost','orderDescription','productId','productCode','orderStatus','orders.created_at','orderId','addrText','addrCity','addrState','addrCountry','addrPincode','addrChat')
                            ->Join('orderaddrs', 'orderaddrs.orderId','orders.id')
                            ->where('orders.id', $orderId)
                            ->where('orders.customerId', $customerId)
                            ->where('orderStatus', 'SAVED')
                            ->where('addrType', 'BILLING')
                            ->get();
        
        foreach ($orders as $order) {
            $dbCurrency = $order->orderCurrency;
        }

        if ($setCurrency){
            $pageCurrency = $setCurrency;
            $cost = $this->setCost($pageCurrency);
        } else {
            $pageCurrency = $dbCurrency;
            $cost = $this->setCost($pageCurrency);
        }

        //  Page data
        $pageData = ([
            'pageCurrency' => $pageCurrency,
            'currencyIcon' => $cost->currencyIcon,
            'cost3600' => $cost->cost3600,
            'cost5000' => $cost->cost5000,
            'cost6000' => $cost->cost6000,
            'cost8000' => $cost->cost8000,
            'cost9000' => $cost->cost9000,
            'cost10000' => $cost->cost10000,
            'cost12000' => $cost->cost12000,
            'cost18000' => $cost->cost18000
        ]);

        return view('user.order-update')->with([
            'orders' => $orders,
            'pageData' => $pageData,
            'orderId' => $orderId,
        ]);
    }

    public function getOrderUpdateCustom()
    {
        $orderCode =  Input::get('orderCode');

        $orders = Order::select('orders.id','orderCode','orderName','orderOrgName','orderEmail','orderContactNo','orderCurrency','orderCost','orderDescription','productId','productCode','orderStatus','orders.created_at','orderId','addrText','addrCity','addrState','addrCountry','addrPincode','addrChat')
                            ->Join('orderaddrs', 'orderaddrs.orderId','orders.id')
                            ->where('orders.orderCode', $orderCode)
                            ->where('orderStatus', 'CRAFTED')
                            ->where('addrType', 'BILLING')
                            ->get();

        if(!$orders) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        foreach ($orders as $order) {
            $dbCurrency = $order->orderCurrency;
            $dbOrderCost = $order->orderCost;
            $orderId = $order->id;
        }

        $pageCurrency = $dbCurrency;
        $cost = $this->setCost($pageCurrency);

        //  Page data
        $pageData = ([
            'pageCurrency' => $dbCurrency,
            'currencyIcon' => $cost->currencyIcon,
            'orderCost' => $dbOrderCost
        ]);

        return view('user.order-update-custom')->with([
            'orders' => $orders,
            'pageData' => $pageData,
            'orderId' => $orderId,
        ]);
    }

    public function updateOrder(Request $request)
    {
        $this->validate($request, [
            'orderName' => 'required|max:60',
            'orderOrgName' => 'required|max:100',
            'orderEmail' => 'required|max:100',
            'orderContactNo' => 'required|max:22',
            'orderCurrency' => 'required|max:5',
            'orderDescription' => 'required:max:1600',

            'addrCity' => 'required|max:30',
            'addrState' => 'required|max:30',
            'addrCountry' => 'required|max:40',
            'addrText' => 'required|max:150',
            'addrPincode' => 'required|max:15',
            'addrChat' => 'max:100'
        ]);

        $customerId = Auth::guard('customer')->id();

        $yearlyCost = $this->getOrderCost($request->input('orderCurrency'));
        $productCode = $request->input('productCode');
        $orderId = $request->input('id');

        //  Let's work on specific order
        $order = Order::select('orderCost', 'productCode','customerId','productId')->where('id', $orderId)->first();
        
        $productCode = $order->productCode;
        $productId = $order->productId;

        
        if ($productCode == 'STATIC-LITE') {
            $orderCost = $yearlyCost->cost3600;
        } elseif ($productCode == 'STATIC-PLUS') {
            $orderCost = $yearlyCost->cost5000;
        } elseif ($productCode == 'PRODUCT-LITE' || $productCode == 'PRODUCT-LITE' || $productCode == 'PRODUCT-LITE') {
            $orderCost = $yearlyCost->cost6000;
        } elseif ($productCode == 'PRODUCT-PLUS') {
            $orderCost = $yearlyCost->cost8000;
        } elseif ($productCode == 'PRODUCT-SHOP' || $productCode == 'PROFILE-BLOG' || $productCode == 'BLOG-SHOP') {
            $orderCost = $yearlyCost->cost12000;
        } elseif ($productCode == 'PROFILE-PLUS' || $productCode == 'BLOG-PLUS') {
            $orderCost = $yearlyCost->cost9000;
        } elseif ($productCode == 'ECOMMERCE') {
            $orderCost = $yearlyCost->cost10000;
        } elseif ($productCode == 'PROFILE-BLOG-SHOP') {
            $orderCost = $yearlyCost->cost18000;
        } elseif ($order->productCode == 'CUSTOM') {
            $orderCost = $order->orderCost;
        }

        $order = Order::find($orderId);

        // Update default Order or Updating Customer order from CRAFTED to SAVED
        $order->customerId = $customerId;
        $order->orderName = $request->input('orderName');
        $order->orderOrgName = $request->input('orderOrgName');
        $order->orderEmail = $request->input('orderEmail');
        $order->orderContactNo = $request->input('orderContactNo');
        $order->orderCurrency = $request->input('orderCurrency');
        $order->orderCost = $orderCost;
        $order->orderDescription = $request->input('orderDescription');
        $order->productId = $request->input('productId');;
        $order->productCode = $request->input('productCode');
        $order->orderStatus = 'SAVED';
        $order->productCode = $productCode;
        $order->productId = $productId;

        $order->save();

        // Update order address
        $orderaddr = Orderaddr::where('orderId', $orderId)->first();

        $orderaddr->customerId = $customerId;
        $orderaddr->addrCity = $request->input('addrCity');
        $orderaddr->addrState = $request->input('addrState');
        $orderaddr->addrCountry = $request->input('addrCountry');
        $orderaddr->addrText = $request->input('addrText');
        $orderaddr->addrPincode = $request->input('addrPincode');
        $orderaddr->addrChat = $request->input('addrChat');
        $orderaddr->save();

        Session::flash('flashmsg', 'Your Order has been Updated.');

        return redirect()->route('order-list');
    }

    public function orderStatus($orderId)
    {
        $customerId = Auth::guard('customer')->id();

        $orders = Order::select('id','customerId','orderCode','orderData1','productCode','orderDescription','created_at')
                        ->where('id', $orderId)
                        ->where('customerId', $customerId)->get();
                        
        if($orders->isEmpty()){
            return redirect()->route('order-list');
        }

        $choices = Orderchoice::select('id','typeName')
                        ->where('orderId', $orderId)
                        ->where('customerId', $customerId)->get();

        $comments = Ordercomment::select('id','commentName','commentText','created_at')
                        ->where('orderId', $orderId)
                        ->where('customerId', $customerId)->get();

        $orderdata = Orderdata::select('id','orderId','domainName','tagLine','contactEmail','contactAddr1','contactAddr2','contentFile','seoContent','pageContent','images','brandImage','favicon','video','videoLink','font')
                        ->where('orderId', $orderId)
                        ->where('customerId', $customerId)->get();                        

        return view('user.order-status')->with([
            'orders' => $orders,
            'choices' => $choices,
            'comments' => $comments,
            'orderdata' => $orderdata,
        ]);
    }

    // public function orderData($orderId, $orderCode)
    // {
    //     $customerId = Auth::guard('customer')->id();

    //     $orderdata = Orderdata::select('id','orderId','domainName','tagLine','contactEmail','contactAddr1','contactAddr2','contentFile','seoContent','pageContent','images','brandImage','favicon','video','videoLink','font')
    //                     ->where('orderId', $orderId)
    //                     ->where('customerId', $customerId)->get();

    //     if($orderdata->isEmpty()){
    //         return redirect()->route('order-list');
    //     }

    //     return view('user.order-data')->with([
    //         'orderdata' => $orderdata,
    //         'orderCode' => $orderCode,
    //     ]);
    // }

    public function ajaxComments(Request $request, $orderId)
    {
        $customerId = Auth::guard('customer')->id();

        $comment = new Ordercomment();

        $comment->orderId = $orderId;
        $comment->customerId = $customerId;
        $comment->commentText = $request->input('commentText');
        $comment->commentName = $request->input('commentName');
        $comment->save();

        return $comment->commentText;
    }

    public function getOrderFavorite()
    {

    }
}
