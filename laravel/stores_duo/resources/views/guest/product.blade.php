@extends('layouts.main')

@section('title')
Products - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Products</h2>
            <p class="home-p">We are Supporting all Major type of Websites for Now and In Up Coming versions we are willing to add More Components and Types of Featured Websites.</p>
            <div class="home-link">
                <a href="{{ url('/ourwork') }}" class="">Check Our Work</a>
                <a href="{{ url('/template') }}" class="first">Check Designs</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="nh-sec-1 nh-wt">
    <div class="container">
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">Our Product can be a Great Support for Small Businesses</h2>
            <h4 class="nh1-h4">If your are Newly Starting your project/business or Taking first step in Online Shop Market, WebCraft is great option for you. Our Demos represent Our Work Quality and Cost are Great considering Initial Investment.</h4>
            <h4 class="nh1-h4">We want you match equation of Invest Less and Gain more. Our Product provides you both Great Design with Great website Management Dashboard.</h4>
        </div>
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/a2.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="nh-sec-1 nh-col">
    <div class="container">
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/fe3.png') }}" class="img-responsive" />
        </div>
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">Portfolio Websites</h2>
            <h4 class="nh1-h4">You may be a Individual or Corporate Firm, If your purpose is to Create Online contact Portal for Services you serve we will suggest you Portfolio Sites. Attractive Designs will surly let more people to Connect with You.</h4>
            <ul class="nh1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>Any Companies looking for Online Profile</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Individual PhotoGraphers</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Real Estate Firms</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Fitness/Yoga Centers</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Cooking/Language Classes</li>
                <li class=""><i class="fa fa-caret-square-right"></i>List will never End, LOL</li>
            </ul>
            <span class="n-link n-link1">
                <a href="{{ url('/product/profile-website') }}" class="">Details..!!</a>
            </span>
            <span class="n-link n-link5">
                <a href="{{ url('/coming-soon') }}" class="">Check Demo..!!</a>
            </span>
        </div>
    </div>
</div>

<div class="nh-sec-1 nh-wt">
    <div class="container">
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">Bloggers Websites</h2>
            <h4 class="nh1-h4">We are aware about importance of time for you. Easy Management and pre written CSS makes updating post and Designing Quick.</h4>
            <ul class="nh1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>Personal Blogs</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Food Blogs</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Fashion Blogs</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Travel Blogs</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Vloggers Personal Profiles</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Post Designing is Highlighting your Nich</li>
            </ul>
            <span class="n-link n-link1">
                <a href="{{ url('/product/blog-website') }}" class="">Details..!!</a>
            </span>
            <span class="n-link n-link5">
                <a href="{{ url('/coming-soon') }}" class="">Check Demo..!!</a>
            </span>
        </div>
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/fe4.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="nh-sec-1 nh-col">
    <div class="container">
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/fe2.png') }}" class="img-responsive" />
        </div>
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">Product Websites</h2>
            <h4 class="nh1-h4">Lookng for International Exposures of your Product? To take your Product in overseas markets you need a quality Website Which an attract Clients, Where we can Support you. Also When Courier Delivery is os Easy, Why Don't you have Online Site?</h4>
            <ul class="nh1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>B2B Market Sellers</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Fashion Material Sellers</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Decorative Arts Sellers</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Online Orders and Payments</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Attractive Designs to Display Product.</li>
            </ul>
            <span class="n-link n-link1">
                <a href="{{ url('/product/product-website') }}" class="">Details..!!</a>
            </span>
            <span class="n-link n-link5">
                <a href="{{ url('/coming-soon') }}" class="">Check Demo..!!</a>
            </span>
        </div>
    </div>
</div>

<div class="nh-sec-1 nh-wt">
    <div class="container">
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">E-Commerce Websites</h2>
            <h4 class="nh1-h4">Our Online Shop is build to integrate with Both Product and Blogs. We Support multiple Payment Gateways as CCAvenue, PayUMoney, EBS, CitrusPay ,ZapakPay (Mobikwik), Mocker.</h4>
            <ul class="nh1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>100s of Product Support</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Payment Gateway Options</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Filters</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Images for Products</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Attractive Designs and Authentication</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Pagings &amp; Sort Functionality</li>
            </ul>
            <span class="n-link n-link1">
                <a href="{{ url('/product/ecommerce-website') }}" class="">Details..!!</a>
            </span>
            <span class="n-link n-link5">
                <a href="{{ url('/coming-soon') }}" class="">Check Demo..!!</a>
            </span>
        </div>
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/fe2.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="nh-sec-1 nh-col">
    <div class="container">
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/fe1.png') }}" class="img-responsive" />
        </div>
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">Static Websites</h2>
            <h4 class="nh1-h4">We are also considering Clients who are not willing to build Just a Static portal for there Clients to Find them. Here we provide you Hosted HTML Pages wrapped in Framwork.</h4>
            <ul class="nh1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>URL structure from framework</li>
                <li class=""><i class="fa fa-caret-square-right"></i>One time Upload as No dashboard Support</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Upgrade to Dashboard version available</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Contact Details, Social Connect Link Support</li>
            </ul>
            <span class="n-link n-link1">
                <a href="{{ url('/product/static-website') }}" class="">Details..!!</a>
            </span>
            <span class="n-link n-link5">
                <a href="{{ url('/coming-soon') }}" class="">Check Demo..!!</a>
            </span>
        </div>
    </div>
</div>

<div class="nh-sec-1 nh-wt">
    <div class="container">
        <div class="nh1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nh1-h2">Custom Websites</h2>
            <h4 class="nh1-h4">You are always welcom with your Custom Ideas, We Have experties to build any complex requirment you have. Prizing and Time Requirments will as per complexity of Project. Leave us a Message and we will Contact you.</h4>
            <div class="nh1-link">
                <a href="{{ url('/contact') }}" class="">Contact Us Now</a>
            </div>
        </div>
        <div class="nh1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/man3.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

@endsection