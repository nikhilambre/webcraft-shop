<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;
use App\Mail\MessageNotificationEmail;

use App\Editsection;
use App\Seo;
use App\Message;
use App\Categor;
use App\Product;
use App\Productimage;
use App\Productcategormap;
use App\Addr;
use App\Social;
use App\Iframe;

class ProductController extends Controller
{
    public function getHomePage()
    {
        $pageName = 'HOME';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        $addressData = Addr::select('id','addressHead','addressBody','addressNumber','addressName','addressEmail','addressLine1','addressLine2','addressLine3','addressLine4')->limit(1)->get();
        $socialData = Social::select('id','socialName','socialLink')->where('pageAuthor', '0')->get();

        $categoryList = Categor::select('id','categoryName','categoryNameSlug')
                                ->where('categoryStatus', 'ACTIVE')
                                ->get();


        $productListData = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','products.created_at')
                                ->where('products.status', 'ACTIVE')
                                ->limit(7)
                                ->orderBy('view','ASC')
                                ->get();

        $productImage[] = [];
        $productCategory[] = [];
        foreach ($productListData as $temp) {
            $productImage[$temp->id] = Productimage::select('imageName')
                                        ->where('productId', $temp->id)
                                        ->limit(1)
                                        ->get();

            $productCategory[$temp->id] = Productcategormap::select('categoryName')
                                                    ->Join('categors', 'categors.id','productcategormaps.categoryId')
                                                    ->where('productcategormaps.productId', $temp->id)
                                                    ->get();
        }


        return view('product.product-home')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'productListData' => $productListData,
            'productImage' => $productImage,
            'productCategory' => $productCategory,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }

    public function getAboutPage()
    {
        $pageName = 'ABOUT';
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

        return view('product.product-about')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }

    public function getContactPage()
    {
        $pageName = 'CONTACT';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

        $addressData = Addr::select('id','addressHead','addressBody','addressNumber','addressName','addressEmail','addressLine1','addressLine2','addressLine3','addressLine4')->get();
        $socialData = Social::select('id','socialName','socialLink')->where('pageAuthor', '0')->get();
        $iframeData = Iframe::select('id','iframeLink')->get();

        $categoryList = Categor::select('id','categoryName','categoryNameSlug')
                                ->where('categoryStatus', 'ACTIVE')
                                ->get();

        return view('product.product-contact')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'addressData' => $addressData,
            'socialData' => $socialData,
            'iframeData' => $iframeData,
        ]);
    }

    public function postContactPage(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
            'messageName' => 'required',
            'messageEmail' => 'required',
            'messageContact' => 'required',
            'messageText' => 'required',
        ]);

        $message = new Message();

        $message->messageName = $request->input('messageName');
        $message->messageEmail = $request->input('messageEmail');
        $message->messageContact = $request->input('messageContact');
        $message->messageFlag = 'Unread';
        $message->messageText = $request->input('messageText');

        $message->save();

        Mail::send(new MessageNotificationEmail($message));
        return response()->json(['message' => 'Message Saved Successfully.'], 201);

    }

    public function getTermsPage()
    {
        $pageName = 'TERMS';

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

        return view('product.product-terms')->with([
            'pageName' => $pageName,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }

    public function getPrivacyPage()
    {
        $pageName = 'PRIVACY';

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

        return view('product.product-privacy')->with([
            'pageName' => $pageName,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
            'categoryList' => $categoryList,
            'addressData' => $addressData,
            'socialData' => $socialData,
        ]);
    }
}
