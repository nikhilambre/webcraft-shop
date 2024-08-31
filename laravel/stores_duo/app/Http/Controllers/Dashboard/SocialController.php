<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;

class SocialController extends Controller
{
    public function postSocial(Request $request)
    {
        $this->validate($request, [
            'socialName' => 'bail|required|unique:socials,socialName|max:40',
            'socialLink' => 'required|max:400'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $social = new Social();

        $social->socialName = $request->input('socialName');
        $social->socialLink = $request->input('socialLink');
        $social->pageAuthor = $request->input('pageAuthor');

        $social->save();
        return response()->json(['social' => $social], 201);
    }

    public function getSocials()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $social = Social::select('id','socialName','socialLink','pageAuthor','created_at')
                            ->get();

        $response = [
            'data' => $social
        ];
        return response()->json($response, 200);
    }

    public function getSocial($id)
    {
        $social = Social::select('id', 'socialName','socialLink','pageAuthor','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $social
        ];
        return response()->json($response, 200);
    }

    public function putSocial(Request $request, $id)
    {
        $social = Social::find($id);

        if(!$social) {
            return response()->json(['message' => 'Social Link not found'], 404);
        }

        $this->validate($request, [
            'socialName' => 'required|unique:socials,socialName,'.$id.'|max:40',
            'socialLink' => 'required|max:400'
        ]);

        $social->socialName = $request->input('socialName');
        $social->socialLink = $request->input('socialLink');
        $social->pageAuthor = $request->input('pageAuthor');

        $social->update();

        return response()->json(['social' => $social], 200);
    }

    public function deleteSocial($id)
    {
        $social = Social::find($id);
        $social->delete();
        return response()->json(['message' => 'Social link deleted Successfully.', 200]);
    }
}
