<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Productoption;

class ProductOptionController extends Controller
{
    public function postOption(Request $request)
    {
        $this->validate($request, [
            'optionName' => 'bail|required|unique:productoptions,optionName|max:60',
            'optionStatus' => 'required|max:40'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $option = new Productoption();

        $option->optionName = $request->input('optionName');
        $option->optionStatus = $request->input('optionStatus');
        $option->save();
        return response()->json(['option' => $option], 201);
    }

    public function getOptions()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $option = Productoption::select('id','optionName','optionStatus','created_at')
                            ->get();

        $response = [
            'data' => $option
        ];
        return response()->json($response, 200);
    }

    public function getOption($id)
    {
        $option = Productoption::select('id', 'optionName', 'optionStatus')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $option
        ];
        return response()->json($response, 200);
    }

    public function putOption(Request $request, $id)
    {
        $option = Productoption::find($id);

        if(!$option) {
            return response()->json(['message' => 'Product Option not found'], 404);
        }

        $this->validate($request, [
            'optionName' => 'required|unique:productoptions,optionName,'.$id.'|max:191',
            'optionStatus' => 'required'
        ]);

        $option->optionName = $request->input('optionName');
        $option->optionStatus = $request->input('optionStatus');

        $option->save();

        return response()->json(['option' => $option], 200);
    }

    public function deleteOption($id)
    {
        $option = Productoption::find($id);
        $option->delete();
        return response()->json(['message' => 'Product Option deleted Successfully.', 200]);
    }
}
