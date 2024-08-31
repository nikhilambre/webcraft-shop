<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogtag;

class BlogTagController extends Controller
{
    public function postBlogTag(Request $request)
    {
        $this->validate($request, [
            'tagName' => 'required|unique:blogtags,tagName|max:40'
        ]);

        $blogtag = new Blogtag();

        $blogtag->tagName = $request->input('tagName');
        $blogtag->tagNameSlug = str_slug($request->input('tagName'), '-');
        $blogtag->save();
        return response()->json(['blogtag' => $blogtag], 201);
    }

    public function getBlogTags()
    {
        //  $blogtags = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogtags = Blogtag::select('id','tagName','created_at')
                            ->get();

        $response = [
            'data' => $blogtags
        ];
        return response()->json($response, 200);
    }

    public function getBlogTag($id)
    {
        $blogtags = Blogtag::select('id', 'tagName', 'created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $blogtags
        ];
        return response()->json($response, 200);
    }

    public function putBlogTag(Request $request, $id)
    {
        $blogtag = Blogtag::find($id);

        if(!$blogtag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $this->validate($request, [
            'tagName' => 'required|unique:blogtags,tagName,'.$id.'|max:40'
        ]);

        $blogtag->tagName = $request->input('tagName');
        $blogtag->tagNameSlug = str_slug($request->input('tagName'), '-');
        $blogtag->update();

        return response()->json(['blogtag' => $blogtag], 200);
    }

    public function deleteBlogTag($id)
    {
        $blogtag = Blogtag::find($id);
        $blogtag->delete();
        return response()->json(['message' => 'Tag deleted Successfully.', 200]);
    }
}
