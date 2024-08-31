<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orderchoice;

class OrderChoiceController extends Controller
{
    public function getOrderChoice($id)
    {
        $orderchoice = Orderchoice::select('id','customerId','orderId','type','typeId','subType','typeName','created_at')
                            ->where('orderId', $id)
                            ->get();

        $response = [
            'data' => $orderchoice
        ];
        return response()->json($response, 200);
    }
}
