<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordercomment;

class OrderCommentController extends Controller
{
    public function postOrderComment(Request $request)
    {
        $this->validate($request, [
            'customerId' => 'required',
            'orderId' => 'required',
            'commentText' => 'required|max:400'
        ]);

        $ordercomment = new Ordercomment();

        $ordercomment->customerId = $request->input('customerId');
        $ordercomment->orderId = $request->input('orderId');
        $ordercomment->commentName = 'Developer';
        $ordercomment->commentText = $request->input('commentText');
        $ordercomment->save();

        return response()->json(['ordercomment' => $ordercomment], 201);
    }

    
    public function getOrderComment($id)
    {
        $ordercomment = Ordercomment::select('id','customerId','orderId','commentName','commentText','created_at')
                            ->where('orderId', $id)
                            ->get();

        $response = [
            'data' => $ordercomment
        ];
        return response()->json($response, 200);
    }
}
