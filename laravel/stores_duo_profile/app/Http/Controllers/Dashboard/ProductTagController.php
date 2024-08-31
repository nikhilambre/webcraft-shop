<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producttag;

class ProductTagController extends Controller
{
    public function postTag(Request $request)
    {
        $this->validate($request, [
            'tagName' => 'bail|required|unique:producttags,tagName|max:40'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $producttag = new Producttag();

        $producttag->tagName = $request->input('tagName');
        $producttag->save();

        return response()->json(['data' => $producttag], 201);
    }

    public function getTags()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $producttag = Producttag::select('id','tagName','created_at')
                            ->get();

        $response = [
            'data' => $producttag
        ];
        return response()->json($response, 200);
    }

    public function getTag($id)
    {
        $producttag = Producttag::select('id', 'tagName')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $producttag
        ];
        return response()->json($response, 200);
    }

    public function putTag(Request $request, $id)
    {
        $producttag = Producttag::find($id);

        if(!$producttag) {
            return response()->json(['message' => 'Product tag not found'], 404);
        }

        $this->validate($request, [
            'tagName' => 'required|unique:producttags,tagName,'.$id.'|max:40'
        ]);

        $producttag->tagName = $request->input('tagName');
        $producttag->save();

        return response()->json(['producttag' => $producttag], 200);
    }

    public function deleteTag($id)
    {
        $producttag = Producttag::find($id);
        $producttag->delete();
        return response()->json(['message' => 'Product tag deleted Successfully.', 200]);
    }
}
