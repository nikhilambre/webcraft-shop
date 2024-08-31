<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producttax;

class ProductTaxController extends Controller
{
    public function postProducttax(Request $request)
    {
        $this->validate($request, [
            'taxCategory' => 'bail|required|unique:producttaxs,taxCategory',     //unique:{tableName},{columnName}
            'taxRate' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $producttax = new Producttax();

        $producttax->taxCategory = $request->input('taxCategory');
        $producttax->taxRate = $request->input('taxRate');
        $producttax->HSNCode = $request->input('HSNCode');
        $producttax->save();
        return response()->json(['Tax' => $producttax], 201);
    }

    public function getProducttaxs()
    {
        $producttax = Producttax::select('id','taxCategory','taxRate','HSNCode','created_at')
                            ->get();

        $response = [
            'data' => $producttax
        ];
        return response()->json($response, 200);
    }

    public function getProducttax($id)
    {
        $producttax = Producttax::select('id', 'taxCategory', 'taxRate', 'HSNCode', 'created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $producttax
        ];
        return response()->json($response, 200);
    }

    public function putProducttax(Request $request, $id)
    {
        $producttax = Producttax::find($id);

        if(!$producttax) {
            return response()->json(['message' => 'Tax not found'], 404);
        }

        $this->validate($request, [
            'taxCategory' => 'required|unique:producttaxs,taxCategory,'.$id,
            'taxRate' => 'required'
        ]);

        $producttax->taxCategory = $request->input('taxCategory');
        $producttax->taxRate = $request->input('taxRate');

        $producttax->update();

        return response()->json(['Tax' => $producttax], 200);
    }

    public function deleteProducttax($id)
    {
        $producttax = Producttax::find($id);
        $producttax->delete();
        return response()->json(['message' => 'Tax deleted Successfully.', 200]);
    }
}
