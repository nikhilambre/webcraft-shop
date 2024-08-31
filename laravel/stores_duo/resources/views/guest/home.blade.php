@extends('layouts.main')

@section('title')
WebCraft Shop | Build your own website | Websites store India
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

<div class="shop1 row">
    <div class="shop1-back">
    </div>

    <div class="container">
        <div class="shop1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="home-h2">Build Your Web Presence</h2>
            <h4 class="home-h4">A perfect platform to build your Dream website, Follow easy steps - Choose website templates, Develope with our developers and Publish.</h4>
            <div class="home-link">
                <a href="#shop6" class="first" id="inPage">Learn More</a>
                <a href="{{ url('/template') }}" class="second">Check Designs</a>
            </div>
        </div>
        <div class="shop1-img hidden-xs col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f7.png') }}" class="img-responsive" />
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
    <span class="shop-span-4"></span>
    <span class="shop-span-5"></span>
</div>

<div class="shop2 row">
    <div class="shop2-back">
    </div>

    <div class="container">
        <div class="shop2-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/d1.png') }}" class="img-responsive" />
        </div>
        <div class="shop2-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="shop2-h2">We Provide Everything for your Online Presence</h2>
            <h4 class="shop2-h4">WebCraft Shop is Providing Quality websites with cheaper rates. Not Required to work with any Website builder and still you got all freedom to choose your website templates.</h4>
            <ul class="shop2-ul list-unstyled">
                <li><a href=""><i class="fa fa-shopping-cart"></i> E-Commerce Website</a></li>
                <li><a href=""><i class="fa fa-shopping-bag"></i> Product Showcase Website</a></li>
                <li><a href=""><i class="fa fa-laptop"></i> Blogging + Shop Website</a></li>
                <li><a href=""><i class="fa fa-id-card"></i> Personal/Company Profile Website</a></li>
                <li><a href=""><i class="fa fa-code"></i> Custom Website - As You have Planned</a></li>
            </ul>
            <div class="shop2-link">
                <a href="{{ url('/product') }}" class="">Check Our Products..!!</a>
            </div>
        </div>
    </div>
    <span class="shop-span-8"></span>
</div>

<div class="shop6 row" id="shop6">
    <div class="container">
        <div class="shop6-head">
            <h2>How We Do It<br><small>You Don't have to Work with Any Website builder Tool</small></h2>
        </div>
        <div class="shop6-box col-xs-12 col-lg-3 text-center">
            <span class="ico-cover">
                <i class="fa fa-search"></i>
            </span>
            <h3 class="shop6-h3">Explore Designs, Select &amp; Place Order</h3>
            <p class="shop6-p">Go through Our Designs &amp; Components, Select What Your Business Needs &amp; Place Order.</p>
            <a href="{{ url('/template') }}">Explore Designs <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="shop6-box-img col-xs-12 col-lg-1 hidden-xs">
            <img src="{{ asset('public/images/arrow-right.png') }}" class="img-responsive" />
        </div>
        <div class="shop6-box-img-xs col-xs-12 col-lg-1 visible-xs">
            <img src="{{ asset('public/images/arrow-down.png') }}" class="img-responsive" />
        </div>
        <div class="shop6-box col-xs-12 col-lg-4 text-center">
            <span class="ico-cover">
                <i class="fa fa-people-carry"></i>
            </span>
            <h3 class="shop6-h3">Collaborate, Share Data &amp; Get it Done.</h3>
            <p class="shop6-p">Share Required Data and Your Ideas with Our Developer. We will build Your Website &amp; Will Host it on Our Servers.</p>
            <a href="{{ url('/feature') }}">Check Features <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="shop6-box-img col-xs-12 col-lg-1 hidden-xs">
            <img src="{{ asset('public/images/arrow-right.png') }}" class="img-responsive" />
        </div>
        <div class="shop6-box-img-xs col-xs-12 col-lg-1 visible-xs">
            <img src="{{ asset('public/images/arrow-down.png') }}" class="img-responsive" />
        </div>
        <div class="shop6-box col-xs-12 col-lg-3 text-center">
            <span class="ico-cover">
                <i class="fa fa-play"></i>
            </span>
            <h3 class="shop6-h3">Access &amp; Manage Your WebSite</h3>
            <p class="shop6-p">Once Hosted, We will Share you Credentials of Dashboard to Upload &amp; Manage Your Website.</p>
            <a href="{{ url('/dashboard') }}">Check Dashboard <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <span class="shop-span-6"></span>
    <span class="shop-span-7"></span>
</div>

<div class="shop3 row p100_">
    <div class="shop3-back">
    </div>

    <div class="container">
        <div class="shop3-head">
            <h2>Websites Build with<br><small>Latest Designs &amp; Development Tools</small></h2>
        </div>
        <div class="box col-xs-12 col-sm-4 col-lg-4 col-md-4">
            <div class="shop3-box">
                <div class="box-img"><img src="{{ asset('public/images/angular.png') }}" alt="angular logo" class="box-img"></div>
                <h4 class="box-h4">Angular 4</h4>
                <p class="box-p">Website Supporting Dashboard is Developed with Angular 4 Framework. It's Amazing.</p>
            </div>
        </div>
        <div class="box col-xs-12 col-sm-4 col-lg-4 col-md-4">
            <div class="shop3-box">
                <div class="box-img"><img src="{{ asset('public/images/bootstrap.png') }}" alt="bootstrap logo" class="box-img"></div>
                <h4 class="box-h4">Bootstrap</h4>
                <p class="box-p">All Designs are Built with Bootstrap. Mobile Responsive structure and It's Beutifull.</p>
            </div>
        </div>
        <div class="box col-xs-12 col-sm-4 col-lg-4 col-md-4">
            <div class="shop3-box">
                <div class="box-img"><img src="{{ asset('public/images/LaravelLogo.png') }}" alt="laravel logo" class="box-img"></div>
                <h4 class="box-h4">Laravel 5.6</h4>
                <p class="box-p">All Websites Backend is powered by with Laravel Framework. It's Awesome.</p>
            </div>
        </div>
    </div>
</div>

<div class="shop4 row">
    <div class="shop4-back">
    </div>

    <div class="container">
        <div class="shop4-box box1 col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="shop4-h2">User Friendly <br>Interface <br>&amp;<br> Beautifully Designed <br>Dashboard <br>to manage all <br>your stuffs.</h2>
            <h4 class="shop4-h4">A perfect platform to build your website, Follow easy steps - Choose website templates, Develop with our Developers and Publish with our Hosting servers.</h4>
            <div class="shop4-link">
                <a href="{{ url('/dashboard') }}" class="">Check Dashboard..!!</a>
            </div>
        </div>
        <div class="shop4-img box2 hidden-xs col-sm-6 col-lg-6 col-md-6">
            <img class="box-img" src="{{ asset('public/images/dash.png') }}" alt="bootstrap logo">
        </div>
    </div>
</div>

<div class="shop5 row p100_">
    <div class="container text-center">
        <h3>Let's Spread your business, Make your presence on web with <span>WebCraft Shop</span>.<br> It's Easy, Fast &amp; Beautiful.!!</h3>
        <a href="{{ url('/template') }}" class="first">Let's Choose Designs Now</a>
        <a href="{{ url('/product') }}" class="second">Check our Products</a>
    </div>
</div>

@endsection

@section('scripts')

@endsection