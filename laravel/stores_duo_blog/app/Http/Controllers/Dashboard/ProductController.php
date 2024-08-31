<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Productimage;
use App\Filter;
use DB;

class ProductController extends Controller
{
    public function postProduct(Request $request)
    {
        $this->validate($request, [
            'productName' => 'bail|required|unique:products,productName|max:191',
            'description' => 'max:8000',
            'shortDescription' => 'max:400|required',
            'status' => 'required',
            'mark' => 'max:40'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $product = new Product();

        $product->productName = $request->input('productName');
        $product->productNameSlug = str_slug($request->input('productName'), '-');
        $product->description = $request->input('description');
        $product->shortDescription = $request->input('shortDescription');
        $product->status = $request->input('status');
        $product->productStock = $request->input('productStock');
        $product->mark = $request->input('mark');
        $product->couponStatus = $request->input('couponStatus');

        $productSaved = $product->save();

        if (!$productSaved) {
            App::abort(500, 'Error while saving data. Try in some time.');
        }
        else {

            $savedProductId = $product->id;

            /*
            * Saved product id is fetched in above line.
            *
            * We have our images from form in productImage[] field  
            * Let's save images with above product id
            */

            $productImg = $request->file('productImage');
            $count = 0;

            if ($request->hasFile('productImage')) {

                foreach ($productImg as $photo) {
                    if ($photo->getClientSize() < 900100) {

                        $count = $count + 1;
                        if ( $count > 5 ) {break;}     // Product can have max 5 images
                        
                        $img = new Productimage();

                        $temp = $photo->getClientOriginalExtension();
                        $newfilename = 'image_' .uniqid(). '.' . $temp;

                        $img->imageSize = $photo->getClientSize();
                        $img->imagePath = Storage::putFileAs('public/product', $photo, $newfilename);
                        $img->imageName = $newfilename;
                        $img->imageType = $photo->getClientMimeType();

                        $img->productId = $savedProductId;
                        $img->save();
                    } 
                    else {
                        $product = Product::find($savedProductId);
                        $product->delete();

                        $img = Productimage::where('productId', $savedProductId);
                        $img->delete();

                        return response()->json(['message' => 'Can not add Product, One of your image File Size Too Large.'], 406);
                    }
                }
            }

            /*
            * We have categories associalted with product in field productCategory[]
            * 
            * Let's first fetch all filers and then will loop for each filter value and will save 
            * catgory selected for that filter in front of product id
            */

            $filters = Filter::select('id','filterName','filterType','created_at')->get();

            foreach ($filters as $filter) {

                $filterId = $filter->id;
                $categotyId = $request->input('productCategory_'.$filterId);

                DB::table('productcategormaps')->insert(
                    ['productId' => $savedProductId, 
                     'filterId' => $filterId,
                     'categoryId' => $categotyId]
                );
            }

            $product = Product::find($savedProductId);

            //  Create product Id for users
            $zeros = str_pad($savedProductId,6,'0',STR_PAD_LEFT);
            $productCode = 'PRD'.date("Y").''.$zeros;
            
            $product->productDisplayId = $productCode;
            $product->save();

            return response()->json(['product' => $product], 201);
        }
    }


    public function getProducts()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $product = Product::select('id','productName','productDisplayId','status','couponStatus','productStock','created_at')
                            ->get();

        $response = [
            'data' => $product
        ];
        return response()->json($response, 200);
    }


    public function getProduct($id)
    {
        $product = Product::select('id','productName','productDisplayId','description', 'shortDescription', 'status','productStock','mark', 'couponStatus', 'created_at as productCreated')
                            ->where('id', '=', $id)
                            ->get()->toArray();

        $productimage = Productimage::select('id as imageId','imageName')
                            ->where('productId', '=', $id)
                            ->get()->toArray();

        $productcats = DB::table('productcategormaps')->select('productcategormaps.categoryId','productId','productcategormaps.filterId','categoryName','filterName')
                            ->leftJoin('filters', 'productcategormaps.filterId', '=', 'filters.id')
                            ->leftJoin('categors', 'productcategormaps.categoryId', '=', 'categors.id')
                            ->where('productId', $id)
                            ->get()->toArray();

        $response = [
            'product' => $product,
            'images' => $productimage,
            'catmaps' => $productcats
        ];
        return response()->json($response, 200);
    }


    public function putProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if(!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        $this->validate($request, [
            'productName' => 'bail|required|unique:products,productName,'.$id.'|max:191',
            'description' => 'max:8000',
            'shortDescription' => 'max:400',
            'status' => 'required',
            'mark' => 'max:40'
        ]);

        $product->productName = $request->input('productName');
        $product->productNameSlug = str_slug($request->input('productName'), '-');
        $product->description = $request->input('description');
        $product->shortDescription = $request->input('shortDescription');
        $product->status = $request->input('status');
        $product->productStock = $request->input('productStock');
        $product->mark = $request->input('mark');
        $product->couponStatus = $request->input('couponStatus');

        $product->save();

        //  Product table data saved now fetch image data
        $productImg = $request->file('productImage');
        $count = 0;

        if ($request->hasFile('productImage')) {
            foreach ($productImg as $photo) {
                if ($photo->getClientSize() < 900100) {

                    $count = $count + 1;
                    if ( $count == 1 ) {
                        $imgCount = DB::table('productimages')->where('productId', $id)->count();
                        $newCount = (5 - $imgCount);
                    }

                    if ( $count > $newCount ) {break;}
                    
                    $img = new Productimage();

                    $temp = $photo->getClientOriginalExtension();
                    $newfilename = 'image_' .uniqid(). '.' . $temp;

                    $img->imageSize = $photo->getClientSize();
                    $img->imagePath = Storage::putFileAs('public/product', $photo, $newfilename);
                    $img->imageName = $newfilename;
                    $img->imageType = $photo->getClientMimeType();

                    $img->productId = $id;
                    $img->save();
                } 
                else {
                    $product = Product::find($savedProductId);
                    $product->delete();

                    $img = Productimage::where('productId', $savedProductId);
                    $img->delete();

                    return response()->json(['message' => 'Can not Update Product, One of your image File Size Too Large.'], 406);
                }
            }
        }

        $filters = Filter::select('id','filterName','filterType','created_at')->get();

        $toDelete = DB::table('productcategormaps')->where('productId', $id);
        $toDelete->delete();
        
        foreach ($filters as $filter) {

            $filterId = $filter->id;
            $categotyId = $request->input('productCategory_'.$filterId);

            DB::table('productcategormaps')->insert(
                ['productId' => $id, 
                 'filterId' => $filterId,
                 'categoryId' => $categotyId]
            );
        }        

        return response()->json(['product' => $product], 201);
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(['message' => 'Product Deleted Succesfully.', 200]);
    }


    public function deleteImage($id)
    {
        $productimage = Productimage::where('id', $id)->get()->first();
        Storage::delete($productimage->imagePath);

        $image = Productimage::find($id);
        $image->delete();
        
        return response()->json(['message' => 'Image Deleted Succesfully.', 200]);
    }
}
