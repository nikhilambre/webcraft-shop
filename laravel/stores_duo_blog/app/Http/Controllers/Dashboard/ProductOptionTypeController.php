<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productoptiontype;

class ProductOptionTypeController extends Controller
{
    public function postOptionType(Request $request)
    {
        $this->validate($request, [
            'optionTypeName' => 'bail|required|max:191',
            'optionId' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $optiontype = new Productoptiontype();

        $optiontype->optionTypeName = $request->input('optionTypeName');
        $optiontype->optionId = $request->input('optionId');
        $optiontype->save();
        return response()->json(['optiontype' => $optiontype], 201);
    }

    public function getOptionTypes()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $optiontype = Productoptiontype::select('productoptiontypes.id','optionTypeName','optionId','optionName','optionStatus','productoptiontypes.created_at')
                                    ->leftJoin('productoptions', 'productoptiontypes.optionId', '=', 'productoptions.id')
                                    ->get();

        $response = [
            'data' => $optiontype
        ];
        return response()->json($response, 200);
    }

    public function getOptionType($id)
    {
        $optiontype = Productoptiontype::select('id', 'optionTypeName', 'optionId')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $optiontype
        ];
        return response()->json($response, 200);
    }

    public function putOptionType(Request $request, $id)
    {
        $optiontype = Productoptiontype::find($id);

        if(!$optiontype) {
            return response()->json(['message' => 'Product Option Type not found'], 404);
        }

        $this->validate($request, [
            'optionTypeName' => 'required|max:191',
            'optionId' => 'required'
        ]);

        $optiontype->optionTypeName = $request->input('optionTypeName');
        $optiontype->optionId = $request->input('optionId');

        $optiontype->update();

        return response()->json(['optiontype' => $optiontype], 200);
    }

    public function deleteOptionType($id)
    {
        $optiontype = Productoptiontype::find($id);
        $optiontype->delete();
        return response()->json(['message' => 'Product Option Type deleted Successfully.', 200]);
    }

    public function getForId($id)
    {
        $optiontype = Productoptiontype::select('id','optionTypeName','optionId','created_at')
                            ->where('optionId', '=', $id)
                            ->get();

        $response = [
            'data' => $optiontype
        ];
        return response()->json($response, 200);
    }
}
