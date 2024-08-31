@extends('layouts.main')

@section('title')
Product Website - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Product Websites</h2>
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
            <h2 class="ni1-h2 text-center">Product Websites Features</h2>
        </div>

        <div class="row ni1-text-cover">
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">What is Included In <br>Product</h3>
                <h4 class="ni1-h4">Product websites are also suitable for B2B Businesses along with Retail businesses. Easy Search with categorised filters which let's a visitor to reach all your products Easily.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Home Page, About Us, Contact Us</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Category wise Product List, All Products &amp; Search List page</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Display Page</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Dashboard</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Send Enquiry Modal</li>
                </ul>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Product Website Features</h3>
                <h4 class="ni1-h4">You may be a Individual or Corporate Firm, If your purpose is to Create Online contact Portal for Services you serve we will suggest you Portfolio Sites. Attractive Designs will surly let more people to Connect with You.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Any Companies looking for Online Profile</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Individual PhotoGraphers</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Real Estate Firms</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Fitness/Yoga Centers</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Cooking/Language Classes</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>List will never End</li>
                </ul>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Integration With E-commerce Shop</h3>
                <h4 class="ni1-h4">Profile Websites can also be integrated with Our E-commerce Module Where You Can Sell Your Product Online. It Will added with Additional Cost, Details on Pricing Page.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Product List, Product Details & Cart Page will be added</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Payment Gateway integration</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Product Selling & Order Management will Be added in Dashboard</li>
                </ul>
            </div>
        </div>
        <div class="row ni1-text-cover">
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Comments, Like &amp; Share Features</h3>
                <h4 class="ni1-h4">Discqus, Facebook and Our own Comments options are available. Users can Like Posts, Share post on Social Media.</h4>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Categorization with Filters</h3>
                <h4 class="ni1-h4">You are always welcome with your Custom Ideas, We Have experties to build any complex requirment you have. Prizing and Time Requirments will as per complexity of Project. Leave us a Message and we will Contact you.</h4>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Attractive Design for Blog Post Display</h3>
                <h4 class="ni1-h4">Blog Post page is designs, Font sizes, Words per line are selected keeping readability of visitors. Related post are shared keeping reading history of users. Easy upload of Images and Videos for Blog Post.</h4>
            </div>
        </div>
    </div>
</div>

@endsection