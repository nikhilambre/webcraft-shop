<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Iframe;

class IframeController extends Controller
{
    public function postIframe(Request $request)
    {
        $this->validate($request, [
            'iframeLink' => 'required|max:400',
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $iframe = new Iframe();

        $iframe->iframeLink = $request->input('iframeLink');
        $iframe->save();
        return response()->json(['iframe' => $iframe], 201);
    }

    public function getIframes()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $iframe = Iframe::select('id','iframeLink','created_at')
                        ->get();

        $response = [
            'data' => $iframe
        ];
        return response()->json($response, 200);
    }

    public function getIframe($id)
    {
        $iframe = Iframe::select('id', 'iframeLink', 'created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $iframe
        ];
        return response()->json($response, 200);
    }

    public function putIframe(Request $request, $id)
    {
        $this->validate($request, [
            'iframeLink' => 'required',
        ]);

        $iframe= Iframe::updateOrCreate(
                        ['id' => $id],
                        ['iframeLink' => $request->input('iframeLink')]
        );

        return response()->json(['iframe' => $iframe], 200);
    }

    public function deleteIframe($id)
    {
        $iframe = Iframe::find($id);
        $iframe->delete();
        return response()->json(['message' => 'Iframe deleted Successfully.', 200]);
    }
}
