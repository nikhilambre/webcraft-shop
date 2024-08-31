<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogcomment;
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
        $blogcomment->commentStatus = 'APPROVED';
        $blogcomment->commentType = 'REPLY';
        $blogcomment->commentFlag = 'READ';
        $blogcomment->commentParentId = $request->input('commentParentId');
        $blogcomment->like = 0;
        $blogcomment->dislike = 0;

        $blogcomment->save();
        return response()->json(['blogcomment' => $blogcomment], 201);
    }

    public function getBlogComments()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogcomment = Blogcomment::select('blogcomments.id','postId','customerId','commentContent','blogposts.postTitle','blogcomments.commentStatus','commentType','like','dislike','blogcomments.created_at')
                            ->leftJoin('blogposts', 'blogposts.id', '=', 'blogcomments.postId')
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
