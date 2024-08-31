<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogtagmap;
use DB;

class BlogTagMapController extends Controller
{
    public function postBlogTagMap(Request $request)
    {
        $this->validate($request, [
            'postId' => 'required',
            'tagId' => 'required'
        ]);

        $blogtagmap = new Blogtagmap();

        $blogtagmap->postId = $request->input('postId');
        $blogtagmap->tagId = $request->input('tagId');
        $blogtagmap->save();
        return response()->json(['blogtagmap' => $blogtagmap], 201);
    }

    public function getBlogTagMaps()
    {
        //  $blogtagmaps = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogtagmaps = Blogtagmap::select('id','postId','tagId','created_at')
                            ->get();

        $response = [
            'data' => $blogtagmaps
        ];
        return response()->json($response, 200);
    }

    public function getBlogTagMap($id)
    {
        $blogtagmaps = Blogtagmap::select('id', 'postId', 'tagId','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $blogtagmaps
        ];
        return response()->json($response, 200);
    }

    public function putBlogTagMap(Request $request, $id)
    {
        $this->validate($request, [
            'postId' => 'required',
            'tagId' => 'required'
        ]);

        $toDelete = Blogtagmap::where('postId', $id);
        $toDelete->delete();

        $blogtagmaps = new Blogtagmap();

        $blogtagmaps->postId = $request->input('postId');
        $tagSet = $request->input('tagId');

        foreach ($tagSet as $tag) {
            DB::table('blogtagmaps')->insert(
                ['postId' => $id, 'tagId' => $tag]
            );
        }

        return response()->json(['blogtagmaps' => $blogtagmaps], 200);
    }

    public function getForId($id)
    {
        $blogtagmap = Blogtagmap::select('id','postId','tagId')
                            ->where('postId', $id)
                            ->get();

        $response = [
            'data' => $blogtagmap
        ];
        return response()->json($response, 200);
    }

    public function deleteBlogTagMap($id)
    {
        $blogtagmap = Blogtagmap::find($id);
        $blogtagmap->delete();
        return response()->json(['message' => 'Tag Map deleted Successfully.', 200]);
    }
}
