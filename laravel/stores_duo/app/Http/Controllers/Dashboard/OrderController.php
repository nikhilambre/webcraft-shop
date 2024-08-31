<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Orderaddr;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function postOrder(Request $request)
    {
        $this->validate($request, [
            'orderName' => 'required|max:60',
            'orderCurrency' => 'required',
            'orderCost' => 'required',
            'orderDescription' => 'required|max:1600',
        ]);

        $order = new Order();

        $order->orderName = $request->input('orderName');
        $order->orderCurrency = $request->input('orderCurrency');
        $order->orderCost = $request->input('orderCost');
        $order->orderDescription = $request->input('orderDescription');
        $order->customerId = '1';
        $order->orderOrgName = 'Your Organisation Name';
        $order->orderEmail = 'Your Email Address';
        $order->orderContactNo = 99999999;
        $order->orderStatus = 'CREATED';
        $order->billingStatus = 'UNPAID';
        $order->deliveryStatus = 'PENDING';
        $order->productCode = 'CUSTOM';
        $order->productId = 0;
        $order->orderTerms = 1;

        $order->save();

        
        //  Fetch saved order id
        $savedOrderId = $order->id;

        //  Save Order address now
        $orderaddr = new Orderaddr();

        $orderaddr->customerId = '1';
        $orderaddr->orderId = $savedOrderId;
        $orderaddr->addrType = 'BILLING';
        $orderaddr->addrCity = 'Your City';
        $orderaddr->addrState = 'Your State';
        $orderaddr->addrCountry = 'Your Country';
        $orderaddr->addrText = 'Address';
        $orderaddr->addrPincode = 'Your Pincode';
        $orderaddr->addrChat = 'Your Chat Address';
        $orderaddr->save();

        //  Save orderCode and redirect page to order save success
        $order = Order::find($savedOrderId);
        $year = Carbon::now()->year;

        $zeros = str_pad($savedOrderId,6,'0',STR_PAD_LEFT);
        $orderCode = 'ORD'.$year.''.$zeros;

        $order->orderStatus = 'CRAFTED';
        $order->orderCode = $orderCode;
        $order->save();

        return response()->json(['order' => $order], 201);
    }

    public function getOrders()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $order = Order::select('id','orderName','productCode','orderCode','orderCost','orderStatus','billingStatus','created_at')
                            ->orderBy('id', 'desc')
                            ->get();

        $response = [
            'data' => $order
        ];
        return response()->json($response, 200);
    }

    public function getOrder($id)
    {
        $order = Order::select('id','customerId','orderCode','orderName','orderOrgName','orderEmail','orderIp','orderContactNo','orderCurrency','orderCost','orderDescription','productId','productCode','orderStatus','billingStatus','deliveryStatus','orderData1','orderData2','orderData3','orderData4','orderTerms','cancelled_on','dispatch_on','delivered_on','completed_on','replace_on','refund_on','updated_at','created_at')
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
