<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Ordercart;

class OrdercartController extends Controller
{
    public function getOrdercarts()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $ordercarts = Ordercart::select('ordercarts.id','ordercarts.currency','productCost','quantity','productName','ordercarts.status','deliveryStatus','ordercarts.created_at')
                                ->leftJoin('products', 'ordercarts.productId', 'products.id')
                                ->get();

        $response = [
            'data' => $ordercart
        ];
        return response()->json($response, 200);
    }

    public function getOrdercart($id)
    {
        $ordercart = Ordercart::select('ordercarts.id','ordercarts.currency','productCost','quantity','couponCode','products.id AS productId','productName','customerId','name','lastname','ordercarts.status','cartCode','deliveryStatus','ordercarts.created_at')
                            ->leftJoin('products', 'ordercarts.productId', 'products.id')
                            ->leftJoin('customers', 'ordercarts.customerId', 'customers.id')
                            ->where('ordercarts.id', $id)
                            ->get();

        $response = [
            'data' => $ordercart
        ];
        return response()->json($response, 200);
    }

    public function getForId($id)
    {
        $ordercart = Ordercart::select('ordercarts.id','ordercarts.currency','productCost','quantity','couponCode','productName','name','lastname','ordercarts.status','cartCode','deliveryStatus','ordercarts.created_at')
                            ->leftJoin('products', 'ordercarts.productId', 'products.id')
                            ->leftJoin('customers', 'ordercarts.customerId', 'customers.id')
                            ->where('cartCode', $id)
                            ->get();

        $response = [
            'data' => $ordercart
        ];
        return response()->json($response, 200);
    }

    public function putOrdercart(Request $request, $id)
    {
        $ordercart = Ordercart::find($id);

        if(!$ordercart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $this->validate($request, [
            'status' => 'required',
            'deliveryStatus' => 'required'
        ]);

        $ordercart->status = $request->input('status');
        $ordercart->deliveryStatus = $request->input('deliveryStatus');

        $ordercart->update();

        return response()->json(['ordercart' => $ordercart], 200);
    }

    public function deleteOrdercart($id)
    {
        $ordercart = Ordercart::find($id);
        $ordercart->delete();
        return response()->json(['message' => 'Cart deleted Successfully.', 200]);
    }
}
