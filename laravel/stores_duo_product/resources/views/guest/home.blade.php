@extends('layouts.main')

@section('title')
StoresBuzz | Build your own website | Ecommerce web store India
@endsection

@section('description')
StoresBuzz is best website builder for online shopping websites, Working to bring all small business online. We know 'How to make your own website?'')
@endsection

@section('keywords')
best website builder, online store, ecommerce website, ecomerce, online store website, Free hosting, ecommerce platforms, buy online, storesbuzz, e commerce, website maker
@endsection

@section('page-image')
https://www.storesbuzz.com/public/images/logo.png
@endsection


@section('content')

<div class="shop1 row">
    <div class="shop1-back">
    </div>

    <div class="container">
        <div class="shop1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="home-h2">We Implement Your Dream</h2>
            <h4 class="home-h4">A perfect platform to build your website, Follow easy steps - Choose website templates, Develope with our developers and Publish.</h4>
            <div class="home-link">
                <a href="feature.php" class="first">Learn More</a>
                <a href="{{ url('/template') }}" class="">Check Designs</a>
            </div>
        </div>
        <div class="shop1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="shop2 row">
    <div class="shop2-back">
    </div>

    <div class="container">
        <div class="shop2-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
        <div class="shop2-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="shop2-h2">We Provide Everything for your Online Presense</h2>
            <h4 class="shop2-h4">A perfect platform to build your website, Follow easy steps - Choose website templates, Develop with our Developers and Publish with our Hosting servers.</h4>
            <ul class="shop2-ul list-unstyled">
                <li><a href=""><i class="fa fa-laptop"></i> E-Commerce Website</a></li>
                <li><a href=""><i class="fa fa-laptop"></i> Product Showcase Website</a></li>
                <li><a href=""><i class="fa fa-laptop"></i> Blogging Website</a></li>
                <li><a href=""><i class="fa fa-laptop"></i> Personal/Company Profile Website</a></li>
            </ul>
            <div class="shop2-link">
                <a href="{{ url('/workflow') }}" class="">Check How We do It..!!</a>
            </div>
        </div>
    </div>
</div>

<div class="shop3 row p100_">
    <div class="shop3-back">
    </div>

    <div class="container">
        <div class="shop3-head">
            <h2>Websites Build with<br><small>Latest Designs &amp; Development Tools</small></h2>
        </div>
        <div class="shop3-box box1 col-xs-12 col-sm-4 col-lg-4 col-md-4">
            <div class="box-img"><img src="{{ asset('public/images/angular.png') }}" alt="angular logo" class="box-img"></div>
            <h4 class="box-h4">Angular</h4>
            <p class="box-p">Website Supporting Dashboard is Developed with Angular 4 Framework. It's Amazing.</p>
        </div>
        <div class="shop3-box box2 col-xs-12 col-sm-4 col-lg-4 col-md-4">
            <div class="box-img"><img src="{{ asset('public/images/bootstrap.png') }}" alt="bootstrap logo" class="box-img"></div>
            <h4 class="box-h4">Bootstrap</h4>
            <p class="box-p">All Designs are Build with Bootstrap. Mobile Responsive structure and It's Beutifull.</p>
        </div>
        <div class="shop3-box box3 col-xs-12 col-sm-4 col-lg-4 col-md-4">
            <div class="box-img"><img src="{{ asset('public/images/laravel.png') }}" alt="laravel logo" class="box-img"></div>
            <h4 class="box-h4">Laravel</h4>
            <p class="box-p">All Websites Backend is powered by with Laravel Framwork. It's Awesome.</p>
        </div>
    </div>
</div>

<div class="shop4 row">
    <div class="shop4-back">
    </div>

    <div class="container">
        <div class="shop4-box box1 col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="shop4-h2">User Friendly Interface &amp; Beautifully Designed Dashboard to manage all your stuffs.</h2>
            <h4 class="shop4-h4">A perfect platform to build your website, Follow easy steps - Choose website templates, Develop with our Developers and Publish with our Hosting servers.</h4>
            <div class="shop4-link">
                <a href="{{ url('/dashboard') }}" class="">Check Dashboard</a>
            </div>
        </div>
        <div class="shop4-img box2 col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img class="box-img" src="{{ asset('public/images/screen.png') }}" alt="bootstrap logo">
        </div>
    </div>
</div>

<div class="shop5 row p100_">
    <div class="container text-center">
        <h3>Let's Spread your business, Make your presence on web with <span>WebShop</span>. It's Easy. It's Fast and Beautiful.</h3>
        <a href="{{ url('/template') }}">Let's Choose a Design Now !!</a>
        <a href="{{ url('/contact') }}">Contact Team</a>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('public/js/draw.js') }}" type="text/javascript"></script>
@endsection