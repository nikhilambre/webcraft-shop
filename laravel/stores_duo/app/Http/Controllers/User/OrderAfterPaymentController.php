<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Orderdata;
use App\Order;

class OrderAfterPaymentController extends Controller
{
    public function orderConfirm()
    {
        //  Update Order status and other fields
        $order = Order::where('orderCode', $orderCode)->get();

        $order->orderStatus = 'PAID';
        $order->billingStatus = 'PAID';
        $order->deliveryStatus = 'INPRODUCTION';
        $order->ordered_on = \Carbon::now();
        $order->save();

        // Create row in order-data table with all value as Not Received
        $customerId = Auth::guard('customer')->id();
        $orderdata = new Orderdata();

        $orderdata->customerId = $customerId;
        $orderdata->orderCode = $orderId;
        $orderdata->save();

        // Mail User & ourself about Order Confirmed
    }

    public function orderFailed()
    {

    }
}
