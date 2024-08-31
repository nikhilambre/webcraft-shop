<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productprice;

class ProductPriceController extends Controller
{
    public function postPrice(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required',
            'priceForQnt' => 'required',
            'taxCategoryId' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $productprice = new Productprice();

        $productprice->productId = $request->input('productId');
        $productprice->price = $request->input('price');
        $productprice->currency = $request->input('currency');
        $productprice->priceForQnt = $request->input('priceForQnt');
        $productprice->discount = $request->input('discount');
        $productprice->tax = $request->input('tax');
        $productprice->finalPrice = $request->input('finalPrice');
        $productprice->taxCategoryId = $request->input('taxCategoryId');
        $productprice->save();

        return response()->json(['data' => $productprice], 201);
    }

    public function getPrices()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $productprice = Productprice::select('productprices.id','productId','productName','productDisplayId','price','currency','priceForQnt','discount','tax','finalPrice','taxCategoryId','taxCategory','taxRate','productprices.created_at')
                                    ->leftJoin('products', 'productprices.productId', '=', 'products.id')
                                    ->leftJoin('producttaxs', 'productprices.taxCategoryId', 'producttaxs.id')
                                    ->get();

        $response = [
            'data' => $productprice
        ];
        return response()->json($response, 200);
    }

    public function getPrice($id)
    {
        $productprice = Productprice::select('productprices.id','productId','productName','productDisplayId','price','currency','priceForQnt','discount','tax','finalPrice','taxCategoryId','taxCategory','taxRate','productprices.created_at')
                            ->leftJoin('products', 'productprices.productId', '=', 'products.id')
                            ->leftJoin('producttaxs', 'productprices.taxCategoryId', 'producttaxs.id')
                            ->where('productprices.id', '=', $id)
                            ->get();

        $response = [
            'data' => $productprice
        ];
        return response()->json($response, 200);
    }

    public function putPrice(Request $request, $id)
    {
        $productprice = Productprice::find($id);

        if(!$productprice) {
            return response()->json(['message' => 'Product Price not found'], 404);
        }

        $this->validate($request, [
            'productId' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required',
            'priceForQnt' => 'required',
            'taxCategoryId' => 'required'
        ]);

        $productprice->productId = $request->input('productId');
        $productprice->price = $request->input('price');
        $productprice->currency = $request->input('currency');
        $productprice->priceForQnt = $request->input('priceForQnt');
        $productprice->discount = $request->input('discount');
        $productprice->tax = $request->input('tax');
        $productprice->finalPrice = $request->input('finalPrice');
        $productprice->taxCategoryId = $request->input('taxCategoryId');

        $productprice->save();

        return response()->json(['data' => $productprice], 200);
    }

    public function deletePrice($id)
    {
        $productprice = Productprice::find($id);
        $productprice->delete();
        return response()->json(['message' => 'Product Price deleted Successfully.', 200]);
    }

    public function getForId($id)
    {
        $productprice = Productprice::select('productprices.id','productId','productName','productDisplayId','currency','finalPrice','taxCategoryId','discount','tax','priceForQnt','productprices.created_at')
                            ->leftJoin('products', 'productprices.productId', '=', 'products.id')
                            ->where('productprices.productId', '=', $id)
                            ->get();

        $response = [
            'data' => $productprice
        ];
        return response()->json($response, 200);
    }

}
