<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogcategor;

class BlogCategoryController extends Controller
{
    public function postBlogCategory(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'required|unique:blogcategors,categoryName|max:40',     //unique:{tableName},{columnName}
            'categoryStatus' => 'required',
        ]);

        $blogcategor = new Blogcategor();

        $blogcategor->categoryName = $request->input('categoryName');
        $blogcategor->categoryNameSlug = str_slug($request->input('categoryName'), '-');
        $blogcategor->categoryStatus = $request->input('categoryStatus');
        $blogcategor->categoryRank = $request->input('categoryRank');
        $blogcategor->save();
        return response()->json(['blogcategor' => $blogcategor], 201);
    }

    public function getBlogCategorys()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogcategor = Blogcategor::select('id','categoryName','categoryNameSlug','categoryStatus','categoryRank','created_at')
                            ->get();

        $response = [
            'data' => $blogcategor
        ];
        return response()->json($response, 200);
    }

    public function getBlogCategory($id)
    {
        $blogcategor = Blogcategor::select('id','categoryName','categoryNameSlug','categoryStatus','categoryRank','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $blogcategor
        ];
        return response()->json($response, 200);
    }

    public function putBlogCategory(Request $request, $id)
    {
        $blogcategor = Blogcategor::find($id);

        if(!$blogcategor) {
            return response()->json(['message' => 'Blog Category not found'], 404);
        }

        $this->validate($request, [
            'categoryName' => 'required|unique:blogcategors,categoryName,'.$id.'|max:40',     //unique:{tableName},{columnName}
            'categoryStatus' => 'required',
        ]);

        $blogcategor->categoryName = $request->input('categoryName');
        $blogcategor->categoryNameSlug = str_slug($request->input('categoryName'), '-');
        $blogcategor->categoryStatus = $request->input('categoryStatus');
        $blogcategor->categoryRank = $request->input('categoryRank');

        $blogcategor->update();

        return response()->json(['blogcategor' => $blogcategor], 200);
    }

    public function deleteBlogCategory($id)
    {
        $blogcategor = Blogcategor::find($id);
        $blogcategor->delete();
        return response()->json(['message' => 'Blog Category deleted Successfully.', 200]);
    }
}
