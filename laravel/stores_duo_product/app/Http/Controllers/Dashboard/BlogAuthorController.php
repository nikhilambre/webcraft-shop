<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Blogauthor;
use App\Social;

class BlogAuthorController extends Controller
{
    public function postBlogAuthor(Request $request)
    {
        $this->validate($request, [
            'authorName' => 'required|unique:blogauthors,authorName|max:100',
            'authorNameSlug' => 'required',
            'authorDetails' => 'required|max:800',
            'authorDescription' => 'required|max:6000',
            'authorProfession' => 'required',
            'authorAge' => 'required|numeric'
        ]);

        $blogauthor = new Blogauthor();

        if ($request->hasFile('authorImage')) {
            
            if ($request->file('authorImage')->getClientSize() < 600100) {

                $temp = $request->file('authorImage')->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $blogauthor->authorImgSize = $request->file('authorImage')->getClientSize();
                $blogauthor->authorImgPath = Storage::putFileAs('public/blog', $request->file('authorImage'), $newfilename);
                $blogauthor->authorImgName = $newfilename;
                $blogauthor->authorImgType = $request->file('authorImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $blogauthor->authorName = $request->input('authorName');
        $blogauthor->authorNameSlug = str_slug($request->input('authorName'), '-');
        $blogauthor->authorDetails = $request->input('authorDetails');
        $blogauthor->authorDescription = $request->input('authorDescription');
        $blogauthor->authorProfession = $request->input('authorProfession');
        $blogauthor->authorAge = $request->input('authorAge');
        $blogauthor->authorEducation = $request->input('authorEducation');

        $blogauthor->save();
        return response()->json(['blogauthor' => $blogauthor], 201);
    }

    public function getBlogAuthors()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogauthor = Blogauthor::select('id','authorName','authorProfession','authorAge','created_at')->get();

        $response = [
            'data' => $blogauthor
        ];
        return response()->json($response, 200);
    }

    public function getBlogAuthor($id)
    {
        $blogauthor = Blogauthor::select('id','authorName','authorDetails','authorDescription','authorProfession','authorAge','authorEducation','authorImgName','created_at')
                            ->where('id', $id)
                            ->get();

        $authorsocial = Social::select('id', 'socialName','socialLink','created_at')
                            ->where('pageAuthor', $id)
                            ->get();

        $response = [
            'blogauthor' => $blogauthor,
            'authorsocial' => $authorsocial,
        ];
        return response()->json($response, 200);
    }

    public function putBlogAuthor(Request $request, $id)
    {
        $blogauthor = Blogauthor::find($id);

        if(!$blogauthor) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $this->validate($request, [
            'authorName' => 'required|unique:blogauthors,authorName,'.$id.'|max:100',
            'authorDetails' => 'required|max:800',
            'authorDescription' => 'required|max:6000',
            'authorProfession' => 'required',
            'authorAge' => 'required|numeric'
        ]);

        if ($request->hasFile('authorImage')) {
            
            if ($request->file('authorImage')->getClientSize() < 600100) {

                $temp = $request->file('authorImage')->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $blogauthor->authorImgSize = $request->file('authorImage')->getClientSize();
                $blogauthor->authorImgPath = Storage::putFileAs('public/blog', $request->file('authorImage'), $newfilename);
                $blogauthor->authorImgName = $newfilename;
                $blogauthor->authorImgType = $request->file('authorImage')->getClientMimeType();
            } 
            else {
                return response()->json(['message' => 'Image File Size Too Large.'], 406);
            }
        }

        $blogauthor->authorName = $request->input('authorName');
        $blogauthor->authorNameSlug = str_slug($request->input('authorName'), '-');
        $blogauthor->authorDetails = $request->input('authorDetails');
        $blogauthor->authorDescription = $request->input('authorDescription');
        $blogauthor->authorProfession = $request->input('authorProfession');
        $blogauthor->authorAge = $request->input('authorAge');
        $blogauthor->authorEducation = $request->input('authorEducation');
        $blogauthor->update();

        return response()->json(['blogauthor' => $blogauthor], 200);
    }

    public function deleteBlogAuthor($id)
    {
        $blogauthor = Blogauthor::find($id);
        $blogauthor->delete();
        return response()->json(['message' => 'Author deleted Successfully.', 200]);
    }
}
