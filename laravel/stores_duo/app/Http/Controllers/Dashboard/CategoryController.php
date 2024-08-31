<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Categor;

class CategoryController extends Controller
{
    public function postCategory(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'bail|required|unique:categors,categoryName|max:60',
            'categoryDescription' => 'required|max:1600',
            'categoryStatus' => 'required',
            'filterId' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $category = new Categor();

        $data = $category->saveData($request);
        return response()->json(['category' => $data], 201);
    }

    public function getCategorys()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $category = Categor::GetAll()->get();

        $response = [
            'data' => $category
        ];
        return response()->json($response, 200);
    }

    public function getCategory($id)
    {
        $category = Categor::GetForId($id)->get();

        $response = [
            'data' => $category
        ];
        return response()->json($response, 200);
    }

    public function putCategory(Request $request, $id)
    {
        $this->validate($request, [
            'categoryName' => 'required|unique:categors,categoryName,'.$id.'|max:191',
            'categoryDescription' => 'required|max:1600',
            'categoryStatus' => 'required',
            'filterId' => 'required',
        ]);

        $category = Categor::find($id)->updateData($request);
        return response()->json(['category' => $category], 200);
    }

    public function deleteCategory($id)
    {
        $category = Categor::find($id);
        $category->delete();
        return response()->json(['message' => 'Category Deleted Succesfully.', 200]);
    }

    public function getForFilter($id)
    {
        $category = Categor::GetForToken($id)->get();

        $response = [
            'data' => $category
        ];
        return response()->json($response, 200);
    }
}
