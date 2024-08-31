<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Auth;
use DB;
use App\Order;
use App\Ordercall;

class OrderActionController extends Controller
{
    public function getDeleteOrder($orderId)
    {
        $customerId = Auth::guard('customer')->id();
        $order = Order::where('id', $orderId)
                        ->where('customerId', $customerId)
                        ->where('orderStatus', 'SAVED')->first();
        
        if(!count($order)){
            return redirect()->route('order-list');
        }

        return view('user.order-delete')->with([
            'orderCode' => $order->orderCode,
            'orderId' => $orderId,
        ]);
    }

    public function getCancelOrder($orderId)
    {
        $customerId = Auth::guard('customer')->id();
        $order = Order::where('id', $orderId)
                        ->where('customerId', $customerId)
                        ->where('orderStatus', 'INPROGRESS')->first();
        
        if(!count($order)){
            return redirect()->route('order-list');
        }

        return view('user.order-cancel')->with([
            'orderCode' => $order->orderCode,
            'orderId' => $orderId,
        ]);
    }

    public function ajaxCancelOrder(Request $request, $orderId)
    {
        $customerId = Auth::guard('customer')->id();
        $order = Order::where('id', $orderId)->where('customerId', $customerId)->first();
        
        if(!count($order)){
            return "No such Order Found.";
        }

        $order->orderStatus = 'CANCELLED';
        $order->cancelled_on = Carbon::now();
        $order->orderData3 = $request->input('cancelText');
        $order->save();

        return "Order Cancellation Initiated.";
    }

    public function ajaxCallOrder(Request $request, $orderId)
    {
        $customerId = Auth::guard('customer')->id();
        $orderCode = $request->input('orderCode');

        $orderCall = Ordercall::updateOrCreate(
            ['customerId' => $customerId, 'orderCode' => $orderCode, 'orderId' => $orderId],
            ['callStatus' => 'OPEN']
        );
        
        return "Call Raised. Will revert you on mail.";
    }

    public function ajaxDeleteOrder(Request $request, $orderId)
    {
        $customerId = Auth::guard('customer')->id();
        $orderCode = $request->input('orderCode');

        $order = Order::where('id', $orderId)
                        ->where('customerId', $customerId)
                        ->where('orderStatus', 'SAVED')->first();

        $order->orderStatus = 'DELETED';
        $order->save();

        return "Order Deleted Successfully..!";        
    }

    public function fileDownload($filename)
    {
        $file_path= public_path()."/data/".$filename;
        
        if (file_exists($file_path))
        {
            $headers = array('Content-Type:text/plain; charset=ISO-8859-15');
            return Response::download($file_path, $filename, $headers);
        }
        else
        {
            exit('Requested file does not exist on our server!');
        }
    }
}
