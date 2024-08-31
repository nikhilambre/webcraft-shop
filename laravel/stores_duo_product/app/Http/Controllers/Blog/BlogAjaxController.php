<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blogcomment;

class BlogAjaxController extends Controller
{
    public function ajaxGetPostReply(Request $request)
    {
        $id = $request->input('commentParentId');

        $blogcomment = Blogcomment::select('blogcomments.id','postId','customerId','name','lastname','customerImgName','commentContent','commentStatus','commentType','commentFlag','commentParentId','blogcomments.created_at')
                                ->join('customers', 'customers.id', 'blogcomments.customerId')
                                ->where('commentParentId', $id)
                                ->where('commentStatus', 'APPROVED')
                                ->where('commentType', 'Reply')
                                ->get();

        return response()->json(['blogcomment' => $blogcomment], 201);
    }

    public function ajaxPostReply(Request $request)
    {
        $this->validate($request, [
            'commentContent' => 'required',
        ]);

        $blogcomment = new Blogcomment();
        
        $blogcomment->commentContent = $request->input('commentContent');
        $blogcomment->postId = $request->input('postId');
        $blogcomment->customerId = Auth::guard('customer')->id();
        $blogcomment->commentStatus = 'PENDING';
        $blogcomment->commentType = 'Reply';
        $blogcomment->commentFlag = 'Unread';
        $blogcomment->commentParentId = $request->input('commentParentId');
        $blogcomment->like = '0';
        $blogcomment->dislike = '0';

        $blogcomment->save();
        return response()->json([
            'status' => 'Success',
            'message' => 'Your Reply Saved Successfully.'
        ], 201);
    }

    public function ajaxPostComment(Request $request)
    {
        $this->validate($request, [
            'commentContent' => 'required',
        ]);

        $blogcomment = new Blogcomment();
        
        $blogcomment->commentContent = $request->input('commentContent');
        $blogcomment->postId = $request->input('postId');
        $blogcomment->customerId = Auth::guard('customer')->id();
        $blogcomment->commentStatus = 'PENDING';
        $blogcomment->commentType = 'Comment';
        $blogcomment->commentFlag = 'Unread';
        $blogcomment->like = '0';
        $blogcomment->dislike = '0';

        $blogcomment->save();
        return response()->json([
            'status' => 'Success',
            'message' => 'Your Comment Saved Successfully.'
        ], 201);
    }
}
