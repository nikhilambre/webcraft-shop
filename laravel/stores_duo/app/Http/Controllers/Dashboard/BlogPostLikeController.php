<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogpostlike;
use App\Recentupdate;

class BlogPostLikeController extends Controller
{
    public function postBlogPostLike(Request $request)
    {
        $this->validate($request, [
            'customerId' => 'required',
            'postId' => 'required',
            'likeType' => 'required'
        ]);

        $blogpostlike = new Blogpostlike();

        $blogpostlike->customerId = $request->input('customerId');
        $blogpostlike->postId = $request->input('postId');
        $blogpostlike->likeType = $request->input('likeType');
        $blogpostlike->save();

        //  Recent update table data
        $recentupdate = new Recentupdate();

        $recentupdate->image = 'f'.mt_rand(1,5).'.png';
        $recentupdate->type = 'like';
        $recentupdate->mapCode = $blogpostlike->id;
        $recentupdate->text33 = $request->input('customerId');
        $recentupdate->text21 = 'Post';
        $recentupdate->text23 = $request->input('postId');
        $recentupdate->save();

        return response()->json(['blogpostlike' => $blogpostlike], 201);
    }

    public function getBlogPostLikes()
    {
        //  $blogpostlikes = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogpostlikes = Blogpostlike::select('blogpostlikes.id','customerId','name','postId','postTitle','likeType','blogpostlikes.created_at')
                                ->leftJoin('customers', 'customers.id', '=', 'blogpostlikes.customerId')
                                ->leftJoin('blogposts', 'blogposts.id', '=', 'blogpostlikes.postId')
                                ->get();

        $response = [
            'data' => $blogpostlikes
        ];
        return response()->json($response, 200);
    }

    public function getBlogPostLike($id)
    {
        $blogpostlikes = Blogpostlike::select('id','customerId','postId','likeType','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $blogpostlikes
        ];
        return response()->json($response, 200);
    }

    public function putBlogPostLike(Request $request, $id)
    {
        $blogpostlike = Blogpostlike::find($id);

        if(!$blogpostlike) {
            return response()->json(['message' => 'Filter not found'], 404);
        }

        $this->validate($request, [
            'customerId' => 'required',
            'postId' => 'required',
            'likeType' => 'required'
        ]);

        $blogpostlike->customerId = $request->input('customerId');
        $blogpostlike->postId = $request->input('postId');
        $blogpostlike->likeType = $request->input('likeType');
        $blogpostlike->update();

        return response()->json(['blogpostlike' => $blogpostlike], 200);
    }

    public function deleteBlogPostLike($id)
    {
        $blogpostlike = Blogpostlike::find($id);
        $blogpostlike->delete();

        $recentupdate = Recentupdate::where('mapCode', $id)->where('type', 'like')->first();
        $recentupdate->delete();

        return response()->json(['message' => 'Post Like deleted Successfully.', 200]);
    }
}
