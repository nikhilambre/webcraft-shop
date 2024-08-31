<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productoptiontypemap;

class ProductOptionTypeMapController extends Controller
{
    public function postOptionTypeMap(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|numeric',
            'optionId' => 'required|numeric',
            'optionTypeId' => 'required|numeric',
            'typeStock' => 'max:1000|numeric'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $productoptiontypemap = new Productoptiontypemap();

        $productoptiontypemap->productId = $request->input('productId');
        $productoptiontypemap->optionId = $request->input('optionId');
        $productoptiontypemap->typeStock = $request->input('typeStock');
        $productoptiontypemap->optionTypeId = $request->input('optionTypeId');
        
        $productoptiontypemap->save();

        return response()->json(['productoptiontypemap' => $productoptiontypemap], 201);
    }

    public function getOptionTypeMaps()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $productoptiontypemap = Productoptiontypemap::select('productoptiontypemaps.id','products.productName','optionName','optionTypeName','typeStock','productoptiontypemaps.created_at')
                            ->leftJoin('products', 'productoptiontypemaps.productId', '=', 'products.id')
                            ->leftJoin('productoptions', 'productoptiontypemaps.optionId', '=', 'productoptions.id')
                            ->leftJoin('productoptiontypes', 'productoptiontypemaps.optionTypeId', '=', 'productoptiontypes.id')
                            ->get();

        $response = [
            'data' => $productoptiontypemap
        ];
        return response()->json($response, 200);
    }

    public function getOptionTypeMap($id)
    {
        $productoptiontypemap = Productoptiontypemap::select('productoptiontypemaps.id','productoptiontypemaps.optionId','productoptiontypemaps.optionTypeId','productoptiontypemaps.productId','products.productName','optionName','optionTypeName','typeStock','productoptiontypemaps.created_at')
                            ->leftJoin('products', 'productoptiontypemaps.productId', '=', 'products.id')
                            ->leftJoin('productoptions', 'productoptiontypemaps.optionId', '=', 'productoptions.id')
                            ->leftJoin('productoptiontypes', 'productoptiontypemaps.optionTypeId', '=', 'productoptiontypes.id')
                            ->where('productoptiontypemaps.id', '=', $id)
                            ->get();

        $response = [
            'data' => $productoptiontypemap
        ];
        return response()->json($response, 200);
    }

    public function putOptionTypeMap(Request $request, $id)
    {
        $productoptiontypemap = Productoptiontypemap::find($id);

        if(!$productoptiontypemap) {
            return response()->json(['message' => 'Product Option Type Mapping not found'], 404);
        }

        $this->validate($request, [
            'productId' => 'required|numeric',
            'optionId' => 'required|numeric',
            'optionTypeId' => 'required|numeric',
            'typeStock' => 'max:1000|numeric'
        ]);

        $productoptiontypemap->productId = $request->input('productId');
        $productoptiontypemap->optionId = $request->input('optionId');
        $productoptiontypemap->typeStock = $request->input('typeStock');
        $productoptiontypemap->optionTypeId = $request->input('optionTypeId');
        $productoptiontypemap->save();

        return response()->json(['productoptiontypemap' => $productoptiontypemap], 200);
    }

    public function deleteOptionTypeMap($id)
    {
        $productoptiontypemap = Productoptiontypemap::find($id);
        $productoptiontypemap->delete();
        return response()->json(['message' => 'Product Option Type Mapping deleted Successfully.', 200]);
    }

    public function getForId($id)
    {
        $productoptiontypemap = Productoptiontypemap::select('productoptiontypemaps.id','products.productName','optionName','optionTypeName','typeStock','productoptiontypemaps.created_at')
                            ->leftJoin('products', 'productoptiontypemaps.productId', '=', 'products.id')
                            ->leftJoin('productoptions', 'productoptiontypemaps.optionId', '=', 'productoptions.id')
                            ->leftJoin('productoptiontypes', 'productoptiontypemaps.optionTypeId', '=', 'productoptiontypes.id')
                            ->where('productoptiontypemaps.productId', '=', $id)
                            ->get();

        $response = [
            'data' => $productoptiontypemap
        ];
        return response()->json($response, 200);
    }
}
