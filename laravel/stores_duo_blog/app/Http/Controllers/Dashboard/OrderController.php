<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function getOrders()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $order = Order::select('id','orderName','productCode','orderCode','productId','orderCost','orderStatus','billingStatus','created_at')
                            ->orderBy('id', 'desc')
                            ->get();

        $response = [
            'data' => $order
        ];
        return response()->json($response, 200);
    }

    public function getOrder($id)
    {
        $order = Order::select('id','customerId','orderCode','orderName','orderOrgName','orderEmail','orderIp',
                                'orderContactNo','orderCurrency','orderCost','orderDescription','productId',
                                'productCode','orderStatus','billingStatus','deliveryStatus','orderData1',
                                'orderData2','orderData3','orderData4','orderTerms','cancelled_on','dispatch_on',
                                'delivered_on','completed_on','replace_on','refund_on','updated_at','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $order
        ];
        return response()->json($response, 200);
    }

    public function putOrder(Request $request, $id)
    {
        $order = Order::find($id);

        if(!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $this->validate($request, [
            'orderStatus' => 'max:20',
            'billingStatus' => 'max:20',
            'deliveryStatus' => 'max:20',
            'orderData1' => 'max:400',
            'orderData2' => 'max:400',
            'orderData3' => 'max:800',
            'orderData4' => 'max:800'            
        ]);

        $now = Carbon::now();
        $cancelled_on = $request->input('cancelled_on');
        $dispatch_on = $request->input('dispatch_on');
        $delivered_on = $request->input('delivered_on');
        $completed_on = $request->input('completed_on');
        $replace_on = $request->input('replace_on');
        $refund_on = $request->input('refund_on');

        $order->orderStatus = $request->input('orderStatus');
        $order->billingStatus = $request->input('billingStatus');
        $order->deliveryStatus = $request->input('deliveryStatus');
        $order->orderData1 = $request->input('orderData1');
        $order->orderData2 = $request->input('orderData2');
        $order->orderData3 = $request->input('orderData3');
        $order->orderData4 = $request->input('orderData4');

        $order->cancelled_on = isset($cancelled_on) ? $now : null;
        $order->dispatch_on = isset($dispatch_on) ? $now : null;
        $order->delivered_on = isset($delivered_on) ? $now : null;
        $order->completed_on = isset($completed_on) ? $now : null;
        $order->replace_on = isset($replace_on) ? $now : null;
        $order->refund_on = isset($refund_on) ? $now : null;
        $order->update();

        return response()->json(['order' => $order], 200);
    }
}
