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
            <h2 class="home-h2">Portfolio Websites</h2>
            <p class="home-p">We are working to add quality features to WebCraft Shop which in turn will simplify your work and can bring more leads to you.</p>
            <div class="home-link">
                <a href="{{ url('/template') }}" class="">Explore Designs</a>
                <a href="{{ url('/coming-soon') }}" class="first">Check Demo</a>
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
            <h2 class="ni1-h2 text-center">Portfolio Websites Features</h2>
        </div>

        <div class="row ni1-text-cover">
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">What is Included In <br>Product</h3>
                <h4 class="ni1-h4">These Websites can be built for wide range of Businesses; we design Theme to match your business profile. Static pages we include will be as per your business requirement & your instructions.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Home Page, About Us &amp; Contact Us Pages</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>6 Static Pages as per Business Profile</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>portfolio Website Dashboard</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Terms, Privacy &amp; 400 Not Found Pages</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>On Page Edit for all Pages</li>
                </ul>
            </div>

            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Features in Detail</h3>
                <h4 class="ni1-h4">We are trying put all Features on Page here to gain Trust of our Client. We are also Working to Build new features to add more functionality for Our Clients.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Customised Home Page as per Your Business</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Design Theme Customized as per Business Profile</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>All Components are Accessible</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Editable Title, Description &amp; Social Media Cards</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Messaging &amp; Email Alerts for New Connects</li>
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
    </div>
</div>
@endsection