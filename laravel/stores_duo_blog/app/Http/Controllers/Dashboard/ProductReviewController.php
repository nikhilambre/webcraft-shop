<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Productreview;

class ProductReviewController extends Controller
{
    public function postProductreview(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required',
            'customerId' => 'required',
            'reviewContent' => 'required',
        ]);

        $newReviewParentId = $request->input('reviewParentId');
        $productreview = Productreview::firstOrNew(array('reviewParentId' => $newReviewParentId));

        $productreview->productId = $request->input('productId');
        $productreview->customerId = $request->input('customerId');
        $productreview->customerVarId = $request->input('customerVarId');
        $productreview->reviewContent = $request->input('reviewContent');
        $productreview->reviewStatus = $request->input('reviewStatus');
        $productreview->reviewType = 'REPLY';
        $productreview->reviewParentId = $request->input('reviewParentId');
        $productreview->rating = '5';
        $productreview->ratingVar1 = $request->input('ratingVar1');
        $productreview->ratingVar2 = $request->input('ratingVar2');

        $productreview->save();
        return response()->json(['productreview' => $productreview], 201);
    }

    public function getProductreviews()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $productreview = Productreview::select('productreviews.id','productId','reviewContent','products.productName','productreviews.reviewStatus','rating','productreviews.created_at')
                            ->leftJoin('products', 'products.id', '=', 'productreviews.productId')
                            ->where('reviewType', 'REVIEW')
                            ->get();

        $response = [
            'data' => $productreview
        ];
        return response()->json($response, 200);
    }

    public function getProductreview($id)
    {
        $productreview = Productreview::select('productreviews.id','productId','products.productName','customerId','customers.name','customers.lastname','customerVarId','reviewContent','productreviews.reviewStatus','reviewType','reviewParentId','rating','ratingVar1','ratingVar2','productreviews.created_at')
                            ->leftJoin('products', 'products.id', '=', 'productreviews.productId')
                            ->leftJoin('customers', 'customers.id', '=', 'productreviews.customerId')
                            ->where(function($q) use ($id){
                                $q->where('productreviews.id', $id)
                                  ->orWhere('productreviews.reviewParentId', $id);
                            })
                            ->get();

        $response = [
            'data' => $productreview
        ];
        return response()->json($response, 200);
    }
}
