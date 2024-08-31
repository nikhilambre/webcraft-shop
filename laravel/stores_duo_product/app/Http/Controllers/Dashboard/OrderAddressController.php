<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orderaddr;

class OrderAddressController extends Controller
{
    public function getOrderAddress($id)
    {
        $orderaddr = Orderaddr::select('id','customerId','orderId','addrType','addrText','addrCity','addrState',
                                        'addrCountry','addrPincode','addrChat','created_at')
                            ->where('orderId', $id)
                            ->get();

        $response = [
            'data' => $orderaddr
        ];
        return response()->json($response, 200);
    }
}
