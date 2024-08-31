<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Blogcategor;
use App\Filter;
use App\Categor;
use App\Product;
use App\Productimage;
use App\Productprice;
use App\Productoptiontypemap;
use App\Ordercart;
use App\Productreview;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class BlogShopController extends Controller
{
    public function getShopListPage()
    {
        $pageName = 'about';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $shopFilter = Filter::select('id','filterName','filterType','created_at')->get();

        foreach ($shopFilter as $temp) {
            $shopCategory[$temp->id] = Categor::select('id','categoryName','created_at')
                                    ->where('categoryStatus', 'ACTIVE')
                                    ->where('filterId', $temp->id)
                                    ->get();
        }

        return view('blog.blog-shop')->with([
            'seo' => $seo,
            'category' => $category,
            'shopFilter' => $shopFilter,
            'shopCategory' => $shopCategory,
        ]);
    }

    public function ajaxFilterWiseProduct(Request $request)
    {
        $sort = Input::get('sort');

        $flow = 'desc';
        if(!$sort){
            $sort = 'id';
        }
        if($sort == 'new'){
            $sort = 'created_at';
        }
        if($sort == 'high'){
            $flow = 'desc';
            $sort = 'finalPrice';
        } elseif($sort == 'low'){
            $flow = 'asc';
            $sort = 'finalPrice';
        }

        //  Location wise currency data and match with our options 
        $currentIp = geoip()->getLocation()->toArray();

        $pageCurrency = Str::lower($currentIp['currency']);
        if($pageCurrency != 'usd' && $pageCurrency != 'inr' && $pageCurrency != 'gbp' && $pageCurrency != 'eur'){
            $pageCurrency == 'usd';
        }

        if (isset($request->filterList)) {
            $filterListData = DB::table('productcategormaps')->select('productId')->whereIn('categoryId', $request->filterList)->get();

            if (!$filterListData->isempty()) {
                $newString = '';
                $initial = 0;
    
                // foreach($filterListData as $temp) {
                //     if($initial == 0){
                //         $newString[$initial] = $temp->productId;
                //         $initial++;
                //     } else {
                //         $newString[$initial] = $temp->productId;
                //     }
                // }
                foreach($filterListData as $temp) {
                    $newString[$initial] = $temp->productId;
                    $initial++;
                }
            } else {
                $newString = [];
            }

            $productListData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','price','priceForQnt','currency','discount','finalPrice','products.created_at')
                                    ->join('productprices', 'productprices.productId','products.id')
                                    ->where('products.status', 'ACTIVE')
                                    ->where('currency', $pageCurrency)
                                    ->orderBy($sort, $flow)
                                    ->whereIn('products.id', $newString)
                                    ->paginate(15);
  
        } else {
            $productListData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','price','priceForQnt','currency','discount','finalPrice','products.created_at')
                                    ->join('productprices', 'productprices.productId','products.id')
                                    ->where('products.status', 'ACTIVE')
                                    ->where('currency', $pageCurrency)
                                    ->orderBy($sort, $flow)
                                    ->paginate(15);
        }

        foreach ($productListData as $temp) {
            $productImage[$temp->id] = Productimage::select('imageName')
                                    ->where('productId', $temp->id)
                                    ->limit(1)
                                    ->get();
        }

        if ($productListData->isEmpty()) {
            $productImage = [];
        }

        return response()->json([
            'productListData' => $productListData,
            'productImage' => $productImage,
            'links' => $productListData->links()->toHtml(),
        ], 201);
    }

    public function getProductPage($productNameSlug)
    {
        $pageName = 'product';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        //  Location wise currency data and match with our options 
        $currentIp = geoip()->getLocation()->toArray();

        $pageCurrency = Str::lower($currentIp['currency']);
        if($pageCurrency != 'usd' && $pageCurrency != 'inr' && $pageCurrency != 'gbp' && $pageCurrency != 'eur'){
            $pageCurrency == 'usd';
        }

        $productData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','description','mark','view','productStock','price','currency','discount','finalPrice','products.created_at')
                                ->join('productprices', 'productprices.productId','products.id')
                                ->where('productNameSlug', $productNameSlug)
                                ->where('currency', $pageCurrency)
                                ->get();

        foreach ($productData as $temp) {
            $id = $temp->id;
            $views = $temp->view;
        }

        //  Update view count by 1
        $productDataUpdate = Product::find($id);
        $productDataUpdate->view = $views + 1;
        $productDataUpdate->update();

        //  Get product related data
        $productImage = Productimage::select('id','imageName')->where('productId', $id)->get();

        $productoption = Productoptiontypemap::select('productId','productoptiontypemaps.optionId','optionName','optionTypeId','optionTypeName','typeStock')
                                ->join('productoptions', 'productoptions.id', 'productoptiontypemaps.optionId')
                                ->join('productoptiontypes', 'productoptiontypes.id', 'productoptiontypemaps.optionTypeId')
                                ->where('productId', $id)
                                ->where('optionStatus', 'ACTIVE')
                                ->get();

    	//  Get Reviews of product                                
        $productreview = Productreview::select('productreviews.id','productreviews.productId','customerId','name','lastname','customerImgName','reviewContent','reviewStatus','reviewType','reviewParentId','rating','ratingVar1','ratingVar2','productreviews.created_at')
                                ->join('customers', 'customers.id', 'productreviews.customerId')
                                ->where('productId', $id)
                                ->where('reviewType', 'REVIEW')
                                ->get();

        $replycount = [];
        foreach ($productreview as $temp) {
            $replycount[$temp->id] = Productreview::where('reviewParentId', $temp->id)->count();
        }

        return view('blog.blog-product')->with([
            'seo' => $seo,
            'category' => $category,
            'productData' => $productData,
            'productImage' => $productImage,
            'productoption' => $productoption,
            'productreview' => $productreview,
            'replycount' => $replycount,
        ]);
    }

    public function ajaxPostReview(Request $request)
    {
        $this->validate($request, [
            'reviewContent' => 'required',
            'rating' => 'required',
        ]);

        $productreview = new Productreview();
        
        $productreview->reviewContent = $request->input('reviewContent');
        $productreview->productId = $request->input('productId');
        $productreview->rating = $request->input('rating');
        $productreview->customerId = Auth::guard('customer')->id();
        $productreview->reviewType = 'REVIEW';
        $productreview->ratingVar1 = $request->input('ratingVar1');
        $productreview->ratingVar2 = $request->input('ratingVar2');

        $productreview->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Your Review Saved Successfully.'
        ], 201);
    }

    public function ajaxGetReviewReply(Request $request)
    {
        $id = $request->input('reviewParentId');

        $reviewReply = Productreview::select('productreviews.id','reviewContent','productreviews.created_at')
                                ->where('reviewParentId', $id)
                                ->where('reviewType', 'REPLY')
                                ->get();

        return response()->json(['reviewReply' => $reviewReply], 201);
    }

    public function ajaxProductToCart(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required',
            'currency' => 'required',
            'productCost' => 'required',
        ]);

        //  Create Cart Entry
        $ordercart = new Ordercart();

        $ordercart->productId = $request->input('productId');
        $ordercart->currency = $request->input('currency');
        $ordercart->productCost = $request->input('productCost');
        $ordercart->quantity = '1';
        $ordercart->customerId = Auth::guard('customer')->id();
        $ordercart->status = 'ACTIVE';
        $ordercart->deliveryStatus = 'Ordered';
        $ordercart->save();

        //  Add Cart Options mapping
        foreach ($request->input('optionChecked') as $option) {

            DB::table('cartoptionmaps')->insert(
                ['productId' => $request->input('productId'), 
                'cartId' => $ordercart->id,
                'optionTypeId' => $option]
            );
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Your Product updated to Cart.'
        ], 201);
    }
}
