<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogcomment;
use App\Recentupdate;
use DB;

class BlogCommentController extends Controller
{
    public function postBlogComment(Request $request)
    {
        $this->validate($request, [
            'postId' => 'required',
            'customerId' => 'required',
            'commentContent' => 'required',
        ]);

        $blogcomment = new Blogcomment();

        $blogcomment->postId = $request->input('postId');
        $blogcomment->customerId = $request->input('customerId');
        $blogcomment->customerVarId = $request->input('customerVarId');
        $blogcomment->commentContent = $request->input('commentContent');
        $blogcomment->commentStatus = $request->input('commentStatus');
        $blogcomment->commentType = $request->input('commentType');
        $blogcomment->commentParentId = $request->input('commentParentId');
        $blogcomment->like = 0;
        $blogcomment->dislike = 0;

        $blogcomment->save();

        //  Recent update table data
        $recentupdate = new Recentupdate();

        $recentupdate->image = 'f'.mt_rand(1,5).'.png';
        $recentupdate->type = 'comment';
        $recentupdate->mapCode = $blogcomment->id;
        $recentupdate->text33 = $request->input('customerId');
        $recentupdate->text21 = 'Post';
        $recentupdate->text23 = $request->input('postId');
        $recentupdate->save();

        return response()->json(['blogcomment' => $blogcomment], 201);
    }

    public function getBlogComments()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogcomment = Blogcomment::select('blogcomments.id','postId','customerId','commentContent','blogposts.postTitle','blogcomments.commentStatus','like','dislike','blogcomments.created_at')
                            ->leftJoin('blogposts', 'blogposts.id', '=', 'blogcomments.postId')
                            ->where('commentType', 'Comment')
                            ->get();

        $response = [
            'data' => $blogcomment
        ];
        return response()->json($response, 200);
    }

    public function getBlogComment($id)
    {
        $blogcomment = Blogcomment::select('blogcomments.id','postId','blogposts.postTitle','customerId','customers.name','customers.lastname','customerVarId','commentContent','blogcomments.commentStatus','commentType','commentParentId','like','dislike','blogcomments.created_at')
                            ->leftJoin('blogposts', 'blogposts.id', '=', 'blogcomments.postId')
                            ->leftJoin('customers', 'customers.id', '=', 'blogcomments.customerId')
                            ->where('blogcomments.id', $id)
                            ->get();

        $response = [
            'data' => $blogcomment
        ];
        return response()->json($response, 200);
    }

    public function putBlogComment(Request $request, $id)
    {
        $blogcomment = Blogcomment::find($id);

        if(!$blogcomment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $this->validate($request, [
            'commentStatus' => 'required'
        ]);

        $blogcomment->commentStatus = $request->input('commentStatus');

        $blogcomment->update();

        return response()->json(['blogcomment' => $blogcomment], 200);
    }

    public function deleteBlogComment($id)
    {
        $blogcomment = Blogcomment::find($id);
        $blogcomment->delete();

        $recentupdate = Recentupdate::where('mapCode', $id)->where('type', 'comment')->first();
        $recentupdate->delete();

        return response()->json(['message' => 'Comment deleted Successfully.', 200]);
    }

    public function getForId($id)
    {
        $blogcomment = DB::select(DB::raw("SELECT A.id, A.authorName 
                            FROM blogauthors AS A, blogposts AS p
                            WHERE P.id = $id
                            AND P.authorId = A.id"));

        $response = [
            'data' => $blogcomment
        ];
        return response()->json($response, 200);
    }
}
