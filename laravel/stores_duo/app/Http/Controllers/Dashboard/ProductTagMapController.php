<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producttagmap;
use DB;

class ProductTagMapController extends Controller
{
    public function postTagMap(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required',
            'tagId' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $producttagmap = new Producttagmap();

        $producttagmap->productId = $request->input('productId');
        $producttagmap->tagId = $request->input('tagId');
        $producttagmap->save();
        return response()->json(['producttagmap' => $producttagmap], 201);
    }

    public function getTagMaps()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $producttagmap = Producttagmap::select('id','productId','tagId','created_at')
                            ->get();

        $response = [
            'data' => $producttagmap
        ];
        return response()->json($response, 200);
    }

    public function getTagMap($id)
    {
        $producttagmap = Producttagmap::select('id', 'productId', 'tagId')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $producttagmap
        ];
        return response()->json($response, 200);
    }

    public function putTagMap(Request $request, $id)
    {
        $this->validate($request, [
            'productId' => 'required',
            'tagId' => 'required'
        ]);

        $toDelete = Producttagmap::where('productId', $id);
        $toDelete->delete();

        $producttagmap = new Producttagmap();

        $producttagmap->productId = $request->input('productId');
        $tagSet = $request->input('tagId');

        foreach ($tagSet as $tag) {
            DB::table('producttagmaps')->insert(
                ['productId' => $id, 'tagId' => $tag]
            );
        }

        return response()->json(['producttagmap' => $producttagmap], 200);
    }

    public function getForId($id)
    {
        $producttagmap = Producttagmap::select('id','productId','tagId')
                            ->where('productId', '=', $id)
                            ->get();

        $response = [
            'data' => $producttagmap
        ];
        return response()->json($response, 200);
    }

    public function deleteProductTagMap($id)
    {
        $producttagmap = Producttagmap::find($id);
        $producttagmap->delete();
        return response()->json(['message' => 'Product tag Mapping deleted Successfully.', 200]);
    }
}
