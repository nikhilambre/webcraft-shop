<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordercall;

class OrderCallController extends Controller
{
    public function getOrderCall($id)
    {
        $ordercall = Ordercall::select('id','customerId','orderId','orderCode','callStatus','created_at')
                            ->where('orderId', $id)
                            ->get();

        $response = [
            'data' => $ordercall
        ];
        return response()->json($response, 200);
    }

    public function putOrderCall(Request $request, $id)
    {
        $ordercall = Ordercall::where('orderId', $id)->get()->first();
        
        if(!$ordercall) {
            return response()->json(['message' => 'Order Call not found'], 404);
        }

        $this->validate($request, [
            'callStatus' => 'max:20',           
        ]);

        $ordercall->callStatus = $request->input('callStatus');
        $ordercall->update();

        return response()->json(['ordercall' => $ordercall], 200);
    }
}
