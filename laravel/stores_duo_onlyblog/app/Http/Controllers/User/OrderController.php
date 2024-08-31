<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\Orderaddr;
use App\Orderchoice;
use App\Orderdata;

use Carbon\Carbon;
use Auth;
use DB;

class OrderController extends Controller
{
    protected function setCost($currency)
    {

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

    public function index($setCurrency = null)
    {
        $id = Auth::guard('customer')->id();

        //  Get all selected components of this customer
        $selections = DB::table('orderfavorites')->select('id','customerId','type','typeId','subType','typeName')
                        ->where('customerId', $id)
                        ->get();

        $selections = json_decode($selections);


        //  Location wise users data 
        $currentIp = geoip()->getLocation()->toArray();


        if ($setCurrency){
            $pageCurrency = $setCurrency;
            $cost = $this->setCost($pageCurrency);
        } else {
            $pageCurrency = $currentIp['currency'];
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

        return view('user.order-create')->with([
            'selections' => $selections,
            'currentIp' => $currentIp,
            'pageData' => $pageData,
        ]);
    }

    public function saveOrder(Request $request)
    {
        $this->validate($request, [
            'orderName' => 'required|max:60',
            'orderOrgName' => 'required|max:100',
            'orderEmail' => 'required|max:100',
            'orderContactNo' => 'required|max:22',
            'orderCurrency' => 'required|max:5',
            'orderDescription' => 'required:max:1600',
            'orderTerms' => 'required',

            'addrCity' => 'required|max:30',
            'addrState' => 'required|max:30',
            'addrCountry' => 'required|max:40',
            'addrText' => 'required|max:150',
            'addrPincode' => 'required|max:15',
            'addrChat' => 'max:100'
        ]);

        $customerId = Auth::guard('customer')->id();
        $currentIp = geoip()->getLocation()->toArray();

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

        //  Save order table data
        $order = new Order();
        
        $order->customerId = $customerId;
        $order->orderName = $request->input('orderName');
        $order->orderOrgName = $request->input('orderOrgName');
        $order->orderEmail = $request->input('orderEmail');
        $order->orderContactNo = $request->input('orderContactNo');
        $order->orderCurrency = $request->input('orderCurrency');
        $order->orderCost = $orderCost;
        $order->orderDescription = $request->input('orderDescription');
        $order->productId = $request->input('productId');
        $order->productCode = $request->input('productCode');
        $order->orderIp = $currentIp['ip'];
        $order->orderStatus = 'CREATED';
        $order->billingStatus = 'UNPAID';
        $order->deliveryStatus = 'PENDING';
        $order->orderTerms = 1;
        $order->save();

        //  Fetch saved order id
        $savedOrderId = $order->id;

        $orderdata = new Orderdata();
        $orderdata->customerId = $customerId;
        $orderdata->orderId = $savedOrderId;
        $orderdata->save();

        //  Save Order address now
        $orderaddr = new Orderaddr();

        $orderaddr->customerId = $customerId;
        $orderaddr->orderId = $savedOrderId;
        $orderaddr->addrType = 'BILLING';
        $orderaddr->addrCity = $request->input('addrCity');
        $orderaddr->addrState = $request->input('addrState');
        $orderaddr->addrCountry = $request->input('addrCountry');
        $orderaddr->addrText = $request->input('addrText');
        $orderaddr->addrPincode = $request->input('addrPincode');
        $orderaddr->addrChat = $request->input('addrChat');
        $orderaddr->save();


        //  Save Order choices from order favorites
        $favorites = DB::table('orderfavorites')->select('type','typeId','subType','typeName')
                        ->where('customerId', $customerId)
                        ->get();

        foreach ($favorites as $f) {

            DB::table('orderchoices')->insert([
                    'customerId' => $customerId,
                    'orderId' => $savedOrderId,
                    'type' => $f->type,
                    'typeId' => $f->typeId,
                    'subType' => $f->subType,
                    'typeName' => $f->typeName,
                ]);
        }

        //  Delete Entry from favorites table to let user place new order
        DB::table('orderfavorites')->where('customerId', $customerId)->delete();
        

        //  Save order Code and redirect page to order save success
        $order = Order::find($savedOrderId);
        $year = Carbon::now()->year;

        $zeros = str_pad($savedOrderId,6,'0',STR_PAD_LEFT);
        $orderCode = 'ORD'.$year.''.$zeros;

        $order->orderStatus = 'SAVED';
        $order->orderCode = $orderCode;
        $order->save();

        return redirect()->route('get.order-saved', ['orderCode' => $orderCode]);
    }

    public function saveDone($orderCode)
    {
        $customerId = Auth::guard('customer')->id();
        $orders = Order::select('id','productCode')->where('customerId', $customerId)->where('orderCode', $orderCode)->get();

        if($orders->isEmpty()){
            return redirect()->route('guest.index');
        }

        return view('user.order-saved')->with([
            'orderCode' => $orderCode,
            'orders' => $orders,
        ]);
    }
}
