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
            'cost3600' => $cost->cost3600,
            'cost5000' => $cost->cost5000,
            'cost6000' => $cost->cost6000,
            'cost8000' => $cost->cost8000,
            'cost9000' => $cost->cost9000,
            'cost10000' => $cost->cost10000,
            'cost12000' => $cost->cost12000,
            'cost18000' => $cost->cost18000
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

        $yearlyCost = $this->getOrderCost($request->input('orderCurrency'));
        $productCode = $request->input('productCode');

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
