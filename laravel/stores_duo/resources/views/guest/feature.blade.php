@extends('layouts.main')

@section('title')
Features - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Features</h2>
            <p class="home-p">We are working to add quality features to WebCraft Shop which in turn will simplify your work and can bring more leads to you.</p>
            <div class="home-link">
                <a href="{{ url('/feature-detail') }}" class="">View Details</a>
                <a href="{{ url('/dashboard') }}" class="first">Purchase Now</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="nb-sec-1 row"><div class="container">
    <div class="nb1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
        <h2 class="nb1-h2">Attractive Design which can bind your clients with you</h2>
        <h4 class="nb1-h4">Your Website design is reflects quality and Beauty of your Product. Our designs are built in way to highlight your products which will attract your visitor.</h4>
        <h4 class="nb1-h4">We have 100+ Design ready and we are continuously updating and improving our designs. Keep your portfolio, Blog, Shop at one Place with webcraft Shop.</h4>
        <ul class="nb1-ul list-unstyled hidden">
            <li><a href=""><i class="fa fa-shopping-cart"></i> E-Commerce Website</a></li>
            <li><a href=""><i class="fa fa-shopping-bag"></i> Product Showcase Website</a></li>
            <li><a href=""><i class="fa fa-laptop"></i> Blogging Website</a></li>
            <li><a href=""><i class="fa fa-handshake"></i> Personal/Company Profile Website</a></li>
            <li><a href=""><i class="fa fa-people-carry"></i> Custom Website</a></li>
        </ul>
        <div class="n-link1 hidden">
            <a href="{{ url('/workflow') }}" class="">Check How We do It..!!</a>
        </div>
    </div>

    <span class="shop-span-1"></span>

    <div class="nb1-tap tap1 hidden-xs">
        <div class="tap">
            <div class="tap-img t1"></div>
            <h3 class="tap-h3 th1">E-Commerce &amp; Product Showcase Web Designs
                <br><small>Something that is big</small>
            </h3>
        </div>
    </div>

    <div class="nb1-tap tap2 hidden-xs">
        <div class="tap">
            <div class="tap-img t2"></div>
            <h3 class="tap-h3 th2">Blog Web Designs
                <br><small>Something that is big</small>
            </h3>
        </div>
    </div>

    <div class="nb1-tap tap3 hidden-xs">
        <div class="tap">
            <div class="tap-img t3"></div>
            <h3 class="tap-h3 th3">Personal/Company Profile Web Designs
                <br><small>Something that is big</small>
            </h3>
        </div>
    </div>

    <div class="nb1-tap tap4 hidden-xs">
        <div class="tap">
            <div class="tap-img t4"></div>
            <h3 class="tap-h3 th4">Custom Web Designs
                <br><small>Something that is big</small>
            </h3>
        </div>
    </div>
</div></div>

<div class="nb-sec-2 row">
    <div class="container">
        <h2 class="nb2-h2 text-center">Dashboard that Centralizes Inventory, Messages, Orders and Product Information <br><small>Making Management Easy</small></h2>
        <div class="row">
            <div class="nb2-text col-xs-12 col-sm-7 col-lg-7 col-md-7">
                <div class="col-xs-12 col-md-6">
                    <div class="das">
                        <h3 class="das-h3">E-Commerce<span> Dashboard manages all about products and lets you focus on Sell</span></h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="das">
                        <h3 class="das-h3">Product<span> Showcase Dashboard eases your work and Keep Healthy traffic on your Board.</span></h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="das">
                        <h3 class="das-h3">Blog Dashboard<span> builds with features that boost your post to Reach </span></h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="das">
                        <h3 class="das-h3">Personal<span> site Dashboard manages all your Messages and connects with visitors.</span></h3>
                    </div>
                </div>
            </div>
            <div class="nb2-img col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <img src="{{ asset('public/images/d3.png') }}" class="img" />
            </div>
        </div>
        <div class="n-link n-link5 _p15">
            <a href="{{ url('/dashboard') }}" class="">Check Our Dashboard..!!</a>
        </div>
    </div>
</div>

<div class="nb-sec-3 row">
    <div class="container">
        <h2 class="nb3-h2">Features list that will attract more Buyers &amp; let your business grow<br><small>Adding to your growth</small></h2>
        <div class="nb3-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <ul class="sec-ul list-unstyled">
                <li><i class="fa fa-check-square"></i>No Technical Or Designing Knowledge Needed</li>
                <li><i class="fa fa-check-square"></i>No Waste of time with Website Builders</li>
                <li><i class="fa fa-check-square"></i>All Support till site in Production</li>
                <li><i class="fa fa-check-square"></i>User Friendly Dashboard for support after Production</li>
                <li><i class="fa fa-check-square"></i>Mail Notifications for your Clients</li>
                <li><i class="fa fa-check-square"></i>Comment, Like &amp; Share for Blogs</li>
                <li><i class="fa fa-check-square"></i>Tags, Filters &amp; Search to Access Blogs</li>
                <li><i class="fa fa-check-square"></i>100's of Products Upload With Multiple Image Support</li>
                <li><i class="fa fa-check-square"></i>Payment Gateway Integration</li>
                <li><i class="fa fa-check-square"></i>Tax/GST Supported</li>
                <li><i class="fa fa-check-square"></i>Multiple Currency Support</li>
                <li><i class="fa fa-check-square"></i>Discount Coupons</li>
                <li><i class="fa fa-check-square"></i>Product Reviews &amp; Ratings</li>
                <li><i class="fa fa-check-square"></i>User's Profile Page &amp; Wish list</li>
                <li><i class="fa fa-check-square"></i>Short Tutorial Videos for Quick Solutions</li>
            </ul>
            <div class="n-link n-link2">
                <a href="{{ url('/feature-detail') }}" class="">Get More Details..!!</a>
            </div>
        </div>
        <div class="nb3-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/vert.png') }}" class="" />
        </div>
    </div>
</div>

<div class="nb-sec-4 row"><div class="container">
    <h2 class="nb4-h2 text-center">Spread Your business with <span>WebCraft</span> Shop</h2>
    <div class="nb4-box col-md-3 col-sm-3 col-lg-3 col-xs-12">
        <div class="img-cov">
            <img src="public/images/t7.png" class="img-responsive" />
        </div>
        <div class="sec-text">
            <h3>Hosting + Emails</h3>
            <p>Free Hosting and Domain Emails included in all packages</p>
        </div>
    </div>
    <div class="nb4-box col-md-3 col-sm-3 col-lg-3 col-xs-12">
        <div class="img-cov">
            <img src="public/images/t6.png" class="img-responsive" />
        </div>
        <div class="sec-text">
            <h3>Integrated Chat App</h3>
            <p>Stay connected with your clients with chat app <a href="https://www.tawk.to/">(tawk.to)</a> in real time</p>
        </div>
    </div>
    <div class="nb4-box col-md-3 col-sm-3 col-lg-3 col-xs-12">
        <div class="img-cov">
            <img src="public/images/t8.png" class="img-responsive" />
        </div>
        <div class="sec-text">
            <h3>Google Analytics</h3>
            <p>Interated with Google analytics to see site progress graph</p>
        </div>
    </div>
    <div class="nb4-box col-md-3 col-sm-3 col-lg-3 col-xs-12">
        <div class="img-cov">
            <img src="public/images/t5.png" class="img-responsive" />
        </div>
        <div class="sec-text">
            <h3>SEO Friendly Code</h3>
            <p>Codes are SEO friendly for search engine for google listing</p>
        </div>
    </div>
</div></div>


<div class="nb-sec-5 row"><div class="container">
    <div class="col-left col-md-5 col-sm-6 col-lg-5 col-xs-12">
        <h2 class="nb5-h2">Easy Page Content Edit feature in real time</h2>
        <h4 class="nb5-h4">Front end content update by user is made easy. Just login to Page Updater and you can edit live website content. No need to contact WebCraft Shop. You can add new text or remove old anytime.</h4>
        <div class="n-link n-link1">
            <a href="{{ url('/feature-cms') }}" class="">Get More Details..!!</a>
        </div>
    </div>
    <div class="col-right col-md-7 col-sm-6 col-lg-7 col-xs-12">
        <img src="public/images/man3.png" class="">
    </div>
</div></div>

@endsection