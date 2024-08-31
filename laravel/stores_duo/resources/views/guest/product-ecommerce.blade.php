@extends('layouts.main')

@section('title')
Ecommerce Website - WebCraft Shop | Build your own website | Websites store India
@endsection

@section('description')
WebCraft Shop is website builder tool for all kind of websites, Working to bring small business online. Cheaper & Quality Websites with Laravel & Angular Frameworks
@endsection

@section('keywords')
best website builder, online store, Blog, ecommerce website, ecomerce, online store website, Free hosting, ecommerce platforms, buy online, webcraft Shop, e commerce, website maker
@endsection

@section('page-image')
https://www.webcraftshop.com/public/images/logo.png
@endsection


@section('content')
<div class="nb-home">
    <div class="nb-back"></div>
    <div class="container">
        <div class="home-box">
            <h2 class="home-h2">Ecommerce Websites</h2>
            <p class="home-p">We are working to add quality features to WebCraft Shop which in turn will simplify your work and can bring more leads to you.</p>
            <div class="home-link">
                <a href="{{ url('/template') }}" class="">Explore Designs</a>
                <a href="javascript:void(0)" class="first">Check Demo</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="nh-sec-1 hidden">
    <div class="nh-back"></div>
    <div class="container">
        <div class="nh1-img col-xs-12 col-lg-12">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="ni-sec-1 nis12 p80_">
    <div class="container">
        <div class="ni1-head row">
            <h2 class="ni1-h2 text-center">E-commerce Websites Features</h2>
        </div>

        <div class="row ni1-text-cover">
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">What is Included In <br>Product</h3>
                <h4 class="ni1-h4">Any Small Scale Creators, Designers &amp; Sellers can Have their Own Online Shop For Cheapest cost with WebCraft Shop. We Tried to provide all Online Shop Features Here.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Listing Home Page, About Us, Contact Us</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Listing Page</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Detail, Cart, Order &amp; Payment Pages</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Fully Equipped dashboard</li>
                </ul>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Ecommerce Website Features</h3>
                <h4 class="ni1-h4">We have Worked to provide you all Possible functionality to Sell Online. We are Working on This product to add More Features.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Multiple Product & images Support</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Ratings &amp; Reviews</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Multiple Payment Gateway Integration</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Multiple Currency Support</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Multiple Filters</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Sorting &amp; Pagination</li>                        
                </ul>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Integration With Other Websites</h3>
                <h4 class="ni1-h4">Shop feature can be available in integration with other websites. Your Blog, Company Profile Websites can have Shop Section where you can sell online.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Product List, Product Details & Cart Page will be added</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Payment Gateway integration</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Selling & Order Management will Be added in Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection