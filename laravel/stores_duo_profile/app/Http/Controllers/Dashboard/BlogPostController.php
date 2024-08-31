<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Blogpost;
use App\Recentupdate;

class BlogPostController extends Controller
{
    public function postBlogPost(Request $request)
    {
        $this->validate($request, [
            'postTitle' => 'required|unique:blogposts,postTitle|max:400',
            'postSubTitle' => 'required',
            'categoryId' => 'required',
            'authorId' => 'required',
            'postContent' => 'required',
            'postStatus' => 'required',
            'commentStatus' => 'required',
        ]);

        $blogpost = new Blogpost();

        if ($request->hasFile('postImage')) {
            
            if ($request->file('postImage')->getClientSize() < 600100) {

                $temp = $request->file('postImage')->getClientOriginalExtension();
                $newfilename = 'postimg_' .uniqid(). '.' . $temp;

                $blogpost->postImgSize = $request->file('postImage')->getClientSize();
                $blogpost->postImgPath = Storage::putFileAs('public/blog', $request->file('postImage'), $newfilename);
                $blogpost->postImgName = $newfilename;
                $blogpost->postImgType = $request->file('postImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $blogpost->categoryId = $request->input('categoryId');
        $blogpost->postSubTitle = $request->input('postSubTitle');
        $blogpost->authorId = $request->input('authorId');
        $blogpost->postTitle = $request->input('postTitle');
        $blogpost->postTitleSlug = str_slug($request->input('postTitle'), '-');
        $blogpost->postContent = $request->input('postContent');
        $blogpost->postImgCredits = $request->input('postImgCredits');
        $blogpost->readMinutes = $request->input('readMinutes');
        $blogpost->postStatus = $request->input('postStatus');
        $blogpost->postRank = $request->input('postRank');
        $blogpost->commentStatus = $request->input('commentStatus');
        $blogpost->commentCount = 0;
        $blogpost->likeCount = 0;
        $blogpost->view = 0;

        $blogpost->save();


        //  Recent update table data
        $recentupdate = new Recentupdate();
        
        $recentupdate->image = 'f'.mt_rand(1,5).'.png';
        $recentupdate->type = 'post';
        $recentupdate->mapCode = $blogpost->id;
        $recentupdate->text13 = $request->input('authorId');
        $recentupdate->text21 = 'Post';
        $recentupdate->text22 = $request->input('postTitle');
        $recentupdate->text23 = $blogpost->id;
        $recentupdate->save();

        return response()->json(['blogpost' => $blogpost], 201);
    }

    public function getBlogPosts()
    {
        //  $blogposts = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogposts = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postStatus','view','blogposts.created_at')
                            ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->get();

        $response = [
            'data' => $blogposts
        ];
        return response()->json($response, 200);
    }

    public function getBlogPost($id)
    {
        $blogposts = Blogpost::select('blogposts.id','categoryId','categoryName','authorId','authorName','postTitle','postSubTitle','postContent','postImgCredits','readMinutes','postStatus','postRank','commentStatus','commentCount','likeCount','view','blogposts.created_at')
                            ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->where('blogposts.id', $id)
                            ->get();

        $response = [
            'data' => $blogposts
        ];
        return response()->json($response, 200);
    }

    public function putBlogPost(Request $request, $id)
    {
        $blogpost = Blogpost::find($id);

        if(!$blogpost) {
            return response()->json(['message' => 'Blog Post not found'], 404);
        }

        $this->validate($request, [
            'postTitle' => 'required|unique:blogposts,postTitle,'.$id.'|max:400',
            'postSubTitle' => 'required',
            'categoryId' => 'required',
            'authorId' => 'required',
            'postContent' => 'required',
            'postStatus' => 'required',
            'commentStatus' => 'required',
        ]);

        if ($request->hasFile('postImage')) {
            
            if ($request->file('postImage')->getClientSize() < 600100) {

                $temp = $request->file('postImage')->getClientOriginalExtension();
                $newfilename = 'postimg_' .uniqid(). '.' . $temp;

                $blogpost->postImgSize = $request->file('postImage')->getClientSize();
                $blogpost->postImgPath = Storage::putFileAs('public/blog', $request->file('postImage'), $newfilename);
                $blogpost->postImgName = $newfilename;
                $blogpost->postImgType = $request->file('postImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $blogpost->categoryId = $request->input('categoryId');
        $blogpost->postSubTitle = $request->input('postSubTitle');
        $blogpost->authorId = $request->input('authorId');
        $blogpost->postTitle = $request->input('postTitle');
        $blogpost->postTitleSlug = str_slug($request->input('postTitle'), '-');
        $blogpost->postContent = $request->input('postContent');
        $blogpost->postImgCredits = $request->input('postImgCredits');
        $blogpost->readMinutes = $request->input('readMinutes');
        $blogpost->postStatus = $request->input('postStatus');
        $blogpost->postRank = $request->input('postRank');
        $blogpost->commentStatus = $request->input('commentStatus');
        $blogpost->commentCount = $request->input('commentCount');

        $blogpost->update();

        return response()->json(['blogpost' => $blogpost], 200);
    }

    public function deleteBlogPost($id)
    {
        $blogpost = Blogpost::find($id);
        
        $imagePath = $blogpost->postImgPath;
        $blogpost->delete();

        if ($imagePath) {
            Storage::delete($imagePath);
        }

        $recentupdate = Recentupdate::where('mapCode', $id)->where('type', 'post')->first();
        if($recentupdate) {
            $recentupdate->delete();
        }

        return response()->json(['message' => 'Blog Post deleted Successfully.', 200]);
    }
}
