<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Productimage;
use App\Categor;
use App\Seo;
use App\Enquir;
use App\Productcategormap;
use App\Addr;
use App\Social;
use App\Editsection;

class ProductManageController extends Controller
{
    public function ajaxGetEnquiryModal(Request $request)
    {
        $id = $request->id;

        $productData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','price','priceForQnt','currency','discount','finalPrice','products.created_at')
                                    ->Leftjoin('productprices', 'productprices.productId','products.id')
                                    ->where('products.id', $id)
                                    ->get();

        $productImage = [];
        foreach ($productData as $temp) {
            $productImage[$temp->id] = Productimage::select('imageName')
                                        ->where('productId', $temp->id)
                                        ->limit(1)
                                        ->get();
        }

        return response()->json([
            'productData' => $productData,
            'productImage' => $productImage,
        ], 201);
    }

    public function getProductPage($productNameSlug)
    {
        $pageName = 'PRODUCT';
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


        $productData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','description','mark','view','productStock','price','priceForQnt','currency','discount','finalPrice','products.created_at')
                                ->Leftjoin('productprices', 'productprices.productId','products.id')
                                ->where('products.productNameSlug', $productNameSlug)
                                ->get();


        foreach ($productData as $temp) {
            $productId = $temp->id;
            $views = $temp->view;
            $productImage[$productId] = Productimage::select('imageName')
                                        ->where('productId', $productId)
                                        ->limit(1)
                                        ->get();
        }

        //  Update view count by 1
        $product = Product::find($productId);
        $product->view = $views + 1;
        $product->update();

        $relatedCategories = Productcategormap::select('id','categoryId')->where('productId', $productId)->get();
        
        $count = 0;
        foreach ($relatedCategories as $cat) {
            $catArray[$count] = $cat->categoryId;
            $count++;
        }

        $relatedProductList = Productcategormap::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','products.created_at')
                                        ->Leftjoin('products', 'products.id','productcategormaps.productId')
                                        ->where('products.status', 'ACTIVE')
                                        ->where('products.id','<>',$productId)
                                        ->whereIn('productcategormaps.categoryId', $catArray)
                                        ->limit(3)
                                        ->get();

        $relatedProductImage = [];
        foreach ($relatedProductList as $t) {
            $relatedProductImage[$t->id] = Productimage::select('imageName')
                                        ->where('productId', $t->id)
                                        ->limit(1)
                                        ->get();
        }


        return view('product.product-single')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'productData' => $productData,
            'productImage' => $productImage,
            'relatedProductList' => $relatedProductList,
            'relatedProductImage' => $relatedProductImage,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }

    public function postEnquiry(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
            'enquiryName' => 'required',
            'enquiryContact' => 'required',
            'productId' => 'required',
            'enquiryText' => 'required',
        ]);

        $captcha = $request->input('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $privatekey = '';

        if ($captcha) {
            $response = file_get_contents("$url?secret=$privatekey&response=$captcha");
            $result = json_decode($response);

            if (isset($result->success) AND $result->success==true) {
                $enquir = new Enquir();

                $enquir->enquiryName = $request->input('enquiryName');
                $enquir->enquiryEmail = $request->input('enquiryEmail');
                $enquir->enquiryContact = $request->input('enquiryContact');
                $enquir->productId = $request->input('productId');
                $enquir->enquiryFlag = 'Unread';
                $enquir->enquiryText = $request->input('enquiryText');
        
                $enquir->save();

                Mail::send(new EnquiryNotificationEmail($enquir));
                return response()->json(['enquir' => 'Enquiry Saved Successfully.'], 201);

            } else {
                return $result->error_code;
            }
        } else {
            return redirect('/');
        }
    }
}
