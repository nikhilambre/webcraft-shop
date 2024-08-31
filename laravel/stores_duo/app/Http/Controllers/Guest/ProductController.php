<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('guest.product');
    }

    public function productBlog()
    {
        return view('guest.product-blog');
    }

    public function productCustom()
    {
        return view('guest.product-custom');
    }

    public function productEcommerce()
    {
        return view('guest.product-ecommerce');
    }

    public function productProfile()
    {
        return view('guest.product-profile');
    }

    public function productStatic()
    {
        return view('guest.product-static');
    }

    public function productProduct()
    {
        return view('guest.product-product');
    }
}
