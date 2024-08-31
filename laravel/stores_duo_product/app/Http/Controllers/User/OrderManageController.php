<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    protected function setCost($currency){
        
        if ($currency == 'USD'){
            $this->currencyIcon = 'usd';
            $this->costStatic = 76;
            $this->costDynamic = 152;
            $this->costBlog = 76;
            $this->costStore = 152;

        } elseif ($currency == 'INR'){
            $this->currencyIcon = 'inr';
            $this->costStatic = 2999;
            $this->costDynamic = 5999;
            $this->costBlog = 4999;
            $this->costStore = 9999;

        } elseif ($currency == 'EUR') {
            $this->currencyIcon = 'eur';
            $this->costStatic = 70;
            $this->costDynamic = 140;
            $this->costBlog = 76;
            $this->costStore = 152;

        } elseif ($currency == 'GBP') {
            $this->currencyIcon = 'gbp';
            $this->costStatic = 60;
            $this->costDynamic = 122;
            $this->costBlog = 76;
            $this->costStore = 152;

        } else {
            $this->currencyIcon = 'usd';
            $this->costStatic = 76;
            $this->costDynamic = 152;
            $this->costBlog = 76;
            $this->costStore = 152;
        }
        return $this;
    }

    public function listOrder()
    {
        $customerId = Auth::guard('customer')->id();

        $orders = Order::select('id','orderCode','orderCurrency','orderCost','productCode','orderStatus','created_at')
                        ->where('orderStatus', '<>' , 'DELETED')
                        ->where('customerId', $customerId)
                        ->get();

        return view('user.order-list')->with([
            'orders' => $orders
        ]);

    }

    public function index($orderId, $setCurrency = null)
    {
        $customerId = Auth::guard('customer')->id();
        
        $orders = DB::select(DB::raw("SELECT ord.id,orderCode,orderName,orderOrgName,orderEmail,orderContactNo,orderCurrency,orderCost,orderDescription,productId,productCode,orderStatus,ord.created_at,orderId,addrText,addrCity,addrState,addrCountry,addrPincode,addrChat 
                                    FROM orders ord, orderaddrs addr
                                    WHERE ord.id = $orderId 
                                    AND orderId = $orderId
                                    AND ord.customerId = $customerId
                                    AND orderStatus = 'SAVED'
                                    AND addrType = 'BILLING'"));
        

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
            'costStatic' => $cost->costStatic,
            'costDynamic' => $cost->costDynamic,
            'costBlog' => $cost->costBlog,
            'costStore' => $cost->costStore
        ]);

        return view('user.order-update')->with([
            'orders' => $orders,
            'pageData' => $pageData,
            'orderId' => $orderId,
        ]);
    }

    public function updateOrder(Request $request, $orderId)
    {
        $customerId = Auth::guard('customer')->id();
        $cost = $this->setCost($request->input('orderCurrency'));
        
        if ($request->input('productCode') == 'SHOWCASE') {
            $orderCost = $cost->costStatic;
        } elseif ($request->input('productCode') == 'PROFILE') {
            $orderCost = $cost->costDynamic;
        } elseif ($request->input('productCode') == 'BLOG') {
            $orderCost = $cost->costBlog;
        } elseif ($request->input('productCode') == 'ECOMMERCE') {
            $orderCost = $cost->costStore;
        } elseif ($request->input('productCode') == 'CUSTOM') {
            $orderCost = 99999999;
        }

        $order = Order::find($orderId);

        if(!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

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

        $order->orderName = $request->input('orderName');
        $order->orderOrgName = $request->input('orderOrgName');
        $order->orderEmail = $request->input('orderEmail');
        $order->orderContactNo = $request->input('orderContactNo');
        $order->orderCurrency = $request->input('orderCurrency');
        $order->orderCost = $orderCost;
        $order->orderDescription = $request->input('orderDescription');
        $order->productId = $request->input('productId');
        $order->productCode = $request->input('productCode');
        $order->save();


        // Update order address

        $orderaddr = Orderaddr::where('orderId', $orderId)->first();

        $orderaddr->addrCity = $request->input('addrCity');
        $orderaddr->addrState = $request->input('addrState');
        $orderaddr->addrCountry = $request->input('addrCountry');
        $orderaddr->addrText = $request->input('addrText');
        $orderaddr->addrPincode = $request->input('addrPincode');
        $orderaddr->addrChat = $request->input('addrChat');
        $orderaddr->update();

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

        return view('user.order-status')->with([
            'orders' => $orders,
            'choices' => $choices,
            'comments' => $comments,
        ]);
    }

    public function orderData($orderId, $orderCode)
    {
        $customerId = Auth::guard('customer')->id();

        $orderdata = Orderdata::select('id','orderId','domainName','tagLine','contactEmail','contactAddr1','contactAddr2','contentFile','seoContent','pageContent','images','brandImage','favicon','video','videoLink','font')
                        ->where('orderId', $orderId)
                        ->where('customerId', $customerId)->get();

        if($orderdata->isEmpty()){
            return redirect()->route('order-list');
        }

        return view('user.order-data')->with([
            'orderdata' => $orderdata,
            'orderCode' => $orderCode,
        ]);
    }

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

}
