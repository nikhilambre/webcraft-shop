<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Softon\Indipay\Facades\Indipay;
use App\Order;

class PaymentController extends Controller
{
    public function index($id)
    {
        $customerId = Auth::guard('customer')->id();
        $tax = 0.18;

        $orders = Order::select('orders.id','orderCode','orderName','orderOrgName','orderEmail','orderContactNo','orderCurrency','orderCost','orderDescription','productId','productCode','orderStatus','orderId','addrText','addrCity','addrState','addrCountry','addrPincode','addrChat','orders.created_at')
                            ->join('orderaddrs', 'orderaddrs.orderId','orders.id')
                            ->where('orders.customerId', $customerId)
                            ->where('orderStatus', 'SAVED')
                            ->where('orders.id', $id)
                            ->where('addrType', 'BILLING')
                            ->get();
        
        foreach ($orders as $order) {
            $currencyIcon = strtolower($order->orderCurrency);
            $orderCost = $order->orderCost;
        }

        $taxCost = $orderCost*$tax;
        $finalCost = $orderCost + $taxCost;

        return view('user.order-payment')->with([
            'orders' => $orders,
            'currencyIcon' => $currencyIcon,
            'finalCost' => $finalCost,
            'taxCost' => $taxCost
        ]);
    }

    public function orderRequest()
    {
        /* All Required Parameters by your Gateway */
        $parameters = [
            'tid' => '1233221223322',
            'order_id' => '1232212',
            'amount' => '1200.00',
        ];
        
        // gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo
        $order = Indipay::gateway('CCAvenue')->prepare($parameters);
        return Indipay::process($order);
    }

    public function orderResponse(Request $request)
    {
        // For default Gateway
        $response = Indipay::response($request);
        
        // For Otherthan Default Gateway
        $response = Indipay::gateway('NameOfGatewayUsedDuringRequest')->response($request);

        dd($response);

        // if (check if failed) {
        //     return redirect()->route('user.order-failed')->with([
        //         'response' => $response,
        //     ]);
        // }

        // if (check if success) {
        //     return redirect()->route('user.order-confirm')->with([
        //         'response' => $response,
        //     ]);
        // }
    }

    public function stripeRequest(Request $request)
    {   

        //  API key from your account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_rsYyQmfEoj2YfNoYQjew47to");
        
        $token = $request->input('token');
        $orderCode = $request->input('orderCode');
        $description = $request->input('orderEmail');
        $cost = $request->input('orderCost');
        $currency = $request->input('currencyIcon');

        //  Verify Order going to create is of logged In user for same cost and currency
        $customerId = Auth::guard('customer')->id();
        
        $orders = Order::select('id','orderCost','orderCurrency')
                        ->where('orderCode', $orderCode)
                        ->where('customerId', $customerId)->get();

        foreach ($orders as $order) {
            $dbCost = $order->orderCost;
            $dbCurrency = $order->orderCurrency;
        }

        if ($dbCost == $cost && $dbCurrency == $currency) {

            $charge = \Stripe\Charge::create(array(
                "amount" => $cost,
                "currency" => $currency,
                "source" => $token,
                "description" => $description,
              ));
        } else{
            return redirect()->route('get.payment');
        }

    }

}
