<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Help;

class HelpController extends Controller
{
    public function postHelp(Request $request)
    {
        $this->validate($request, [
            'helpQuestion' => 'bail|required|unique:helps,helpQuestion|max:400',     //unique:{tableName},{columnName}
            'helpAnswer' => 'required|max:4000'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $help = new Help();

        $help->helpQuestion = $request->input('helpQuestion');
        $help->helpAnswer = $request->input('helpAnswer');
        $help->save();
        return response()->json(['help' => $help], 201);
    }

    public function getHelps()
    {
        //  $helps = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $helps = Help::select('id','helpQuestion','helpAnswer','created_at')->get();

        $response = [
            'data' => $helps
        ];
        return response()->json($response, 200);
    }

    public function getHelp($id)
    {
        $helps = Help::select('id', 'helpQuestion', 'helpAnswer')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $helps
        ];
        return response()->json($response, 200);
    }

    public function putHelp(Request $request, $id)
    {
        $help = Help::find($id);

        if(!$help) {
            return response()->json(['message' => 'Help Question not found'], 404);
        }

        $this->validate($request, [
            'helpQuestion' => 'required|unique:helps,helpQuestion,'.$id.'|max:40',
            'helpAnswer' => 'required|max:4000'
        ]);

        $help->helpQuestion = $request->input('helpQuestion');
        $help->helpAnswer = $request->input('helpAnswer');

        $help->update();

        return response()->json(['help' => $help], 200);
    }

    public function deleteHelp($id)
    {
        $help = Help::find($id);
        $help->delete();
        return response()->json(['message' => 'Help Question deleted Successfully.', 200]);
    }
}
