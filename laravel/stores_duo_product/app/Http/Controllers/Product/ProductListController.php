<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Productcategormap;
use App\Seo;
use App\Productimage;
use App\Categor;
use App\Product;
use App\Addr;
use App\Social;
use App\Editsection;

class ProductListController extends Controller
{
    public function getCatwiseListPage($categoryNameSlug)
    {
        $pageName = 'CATEGOTY-LIST';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        $addressData = Addr::select('id','addressHead','addressBody','addressNumber','addressName','addressEmail','addressLine1','addressLine2','addressLine3','addressLine4')->get();
        $socialData = Social::select('id','socialName','socialLink')->where('pageAuthor', '0')->get();

        $categoryList = Categor::select('id','categoryName','categoryNameSlug')
                                ->where('categoryStatus', 'ACTIVE')
                                ->get();

        $selectedCategory = Categor::select('id','categoryName','categoryNameSlug')
                                    ->where('categoryNameSlug', $categoryNameSlug)
                                    ->get();

        return view('product.product-category-list')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'selectedCategory' => $selectedCategory,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }

    public function ajaxCatwiseProducts(Request $request)
    {
        $categoryId = $request->categoryId;

        $productListData = Productcategormap::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','products.created_at')
                                ->Leftjoin('products', 'products.id','productcategormaps.productId')
                                ->where('products.status', 'ACTIVE')
                                ->where('productcategormaps.categoryId', $categoryId)
                                ->paginate(15);

        $productImage = [];
        foreach ($productListData as $temp) {
            $productImage[$temp->id] = Productimage::select('imageName')
                                    ->where('productId', $temp->id)
                                    ->limit(1)
                                    ->get();
        }

        return response()->json([
            'productListData' => $productListData,
            'productImage' => $productImage,
            'links' => $productListData->links()->toHtml(),
        ], 201);
    }

    public function getProductListPage()
    {
        $pageName = 'PRODUCT-LIST';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        $addressData = Addr::select('id','addressHead','addressBody','addressNumber','addressName','addressEmail','addressLine1','addressLine2','addressLine3','addressLine4')->get();
        $socialData = Social::select('id','socialName','socialLink')->where('pageAuthor', '0')->get();

        $categoryList = Categor::select('id','categoryName','categoryNameSlug')
                                ->where('categoryStatus', 'ACTIVE')
                                ->get();


        return view('product.product-list')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }

    public function ajaxProductList()
    {
        $productListData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','products.created_at')
                                ->where('products.status', 'ACTIVE')
                                ->paginate(15);

        $productImage = [];
        foreach ($productListData as $temp) {
            $productImage[$temp->id] = Productimage::select('imageName')
                                    ->where('productId', $temp->id)
                                    ->limit(1)
                                    ->get();
        }

        return response()->json([
            'productListData' => $productListData,
            'productImage' => $productImage,
            'links' => $productListData->links()->toHtml(),
        ], 201);
    }
}
