<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Blogcategor;
use App\Customer;
use App\Order;
use App\Ordercart;
use App\Productimage;
use App\Productwishlist;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Customeraddr;
use Illuminate\Support\Str;

class BlogManageController extends Controller
{
    public function getProfilePage()
    {
        $pageName = 'order';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $customerId = Auth::guard('customer')->id();

        $customer = Customer::select('customers.id','name','lastname','email','contact_no','customerImgName','addrText','addrCity','addrState','addrCountry','addrPincode','customers.created_at')
                                ->join('customeraddrs', 'customeraddrs.customerId','customers.id')
                                ->where('customers.id', $customerId)
                                ->get();

        $order = Order::select('id','orderCode','productId AS productCartId','created_at')
                                ->where('customerId', $customerId)
                                ->paginate(4);

        foreach ($order as $temp) {
            $cartData[$temp->id] = Ordercart::select('ordercarts.id','productId','quantity','currency','productCost','productDisplayId','productName','productNameSlug','ordercarts.currency','productCost','deliveryStatus','cartCode','ordercarts.created_at')
                                        ->join('products', 'products.id','ordercarts.productId')
                                        ->where('cartCode', $temp->productCartId)
                                        ->get();

            foreach($cartData[$temp->id] as $temp1) {
                $cartImage[$temp1->id] = Productimage::select('imageName')->where('productId', $temp1->productId)->limit(1)->get();
            }
        }

        return view('blog.blog-user-profile')->with([
            'seo' => $seo,
            'category' => $category,
            'customer' => $customer,
            'order' => $order,
            'cartData' => $cartData,
            'cartImage' => $cartImage,
        ]);
    }

    public function getProfileEditPage()
    {
        $pageName = 'order';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $customerId = Auth::guard('customer')->id();

        $customer = Customer::select('customers.id','name','lastname','email','contact_no','customerImgName','addrText','addrCity','addrState','addrCountry','addrPincode','customers.created_at')
                                ->join('customeraddrs', 'customeraddrs.customerId','customers.id')
                                ->where('customers.id', $customerId)
                                ->get();


        return view('blog.blog-user-profile-edit')->with([
            'seo' => $seo,
            'category' => $category,
            'customer' => $customer,
        ]);
    }

    public function postProfilePage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:40',
            'lastname' => 'required|max:60',
        ]);

        $customerId = Auth::guard('customer')->id();
        $customer = Customer::find($customerId);

        $customer->name = $request->input('name');
        $customer->lastname = $request->input('lastname');
        $customer->contact_no = $request->input('contact_no');

        //  User Profile Pic
        $userImage = $request->file('userImage');

        if ($request->hasFile('userImage')) {
            if ($userImage->getClientSize() < 900100) {

                $temp = $userImage->getClientOriginalExtension();
                $newfilename = 'image_' .uniqid(). '.' . $temp;

                $customer->customerImgSize = $userImage->getClientSize();
                $customer->customerImgPath = Storage::putFileAs('public/user', $userImage, $newfilename);
                $customer->customerImgName = $newfilename;
                $customer->customerImgType = $userImage->getClientMimeType();
            }
        }
        $customer->save();

        $customeraddr = Customeraddr::where('customerId', $customerId)->first();

        $customeraddr->addrType = 'DELIVERY';
        $customeraddr->addrText = $request->input('addrText');
        $customeraddr->addrCity = $request->input('addrCity');
        $customeraddr->addrState = $request->input('addrState');
        $customeraddr->addrCountry = $request->input('addrCountry');
        $customeraddr->addrPincode = $request->input('addrPincode');
        $customeraddr->save();

        return redirect()->route('blog.profile');
    }

    public function getWishlistPage()
    {
        $pageName = 'wishlist';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $customerId = Auth::guard('customer')->id();

        //  Location wise currency data and match with our options 
        $currentIp = geoip()->getLocation()->toArray();

        $pageCurrency = Str::lower($currentIp['currency']);
        if($pageCurrency != 'usd' && $pageCurrency != 'inr' && $pageCurrency != 'gbp' && $pageCurrency != 'eur'){
            $pageCurrency == 'usd';
        }

        $productList = Productwishlist::select('productwishlists.id','productwishlists.productId','productName','productNameSlug','shortDescription','status','mark','price','currency','discount','finalPrice')
                                ->join('products', 'products.id','productwishlists.productId')
                                ->join('productprices', 'productprices.productId','productwishlists.productId')
                                ->where('customerId', $customerId)
                                ->where('currency', $pageCurrency)
                                ->where('products.status', 'ACTIVE')
                                ->paginate(15);

        if($productList->isEmpty()) {
            return view('blog.blog-user-wishlist-empty')->with([
                'seo' => $seo,
                'category' => $category,
            ]);
        }

        $productImage = [];
        foreach ($productList as $temp) {
            $productImage[$temp->id] = Productimage::select('imageName')
                                    ->where('productId', $temp->productId)
                                    ->limit(1)
                                    ->get();
        }

        return view('blog.blog-user-wishlist')->with([
            'seo' => $seo,
            'category' => $category,
            'productList' => $productList,
            'productImage' => $productImage,
        ]);

    }
}
