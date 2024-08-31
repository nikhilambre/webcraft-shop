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

<div class="temp1 row">
    <div class="temp1-back">
    </div>

    <div class="container">
        <div class="temp1-block">
            <h2 class="temp1-h2">Templates &amp; Themes</h2>
            <h4>We Provide you wide variety of templates and also Components to choose from.</h4>
        </div>
    </div>
</div>

<div class="temp2 row">
    <div class="temp2-back">
    </div>

    <div class="container p100_">
    <div class="temp2-img col-xs-12 col-sm-7 col-lg-7 col-md-7">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
        <div class="temp2-text col-xs-12 col-sm-5 col-lg-5 col-md-5">
            <span class="circle"></span>
            <h2 class="temp2-h2">Templates</h2>
            <h4 class="temp2-h4">WebShop Templates collection includes variouse Designs for eCommerce, Blogs, Product Showcasae, Company, Portfolio, weddings etc. and also We are continuesly growing with your requirments.</h4>
            <div class="temp2-link">
                <a href="{{ url('/template-list') }}" class="">List of Templates</a>
            </div>
        </div>
    </div>
</div>

<div class="temp3 row">
    <div class="temp3-back">
    </div>

    <div class="container p100_">
        <div class="temp3-text col-xs-12 col-sm-5 col-lg-5 col-md-5 text-right">
            <span class="circle"></span>
            <h2 class="temp3-h2">Components</h2>
            <h4 class="temp3-h4">We have Components designed to integrate with your theme or you can list all your favorite components to build your Design.</h4>
            <div class="temp3-link">
                <a href="{{ url('/template-list') }}" class="">List of Componets</a>
            </div>
        </div>
        <div class="temp3-img col-xs-12 col-sm-7 col-lg-7 col-md-7">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="temp4 row">
    <div class="temp4-back">
    </div>

    <div class="container p100_">
        <div class="temp4-img col-xs-12 col-sm-7 col-lg-7 col-md-7">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
        <div class="temp4-text col-xs-12 col-sm-5 col-lg-5 col-md-5">
            <span class="circle"></span>
            <h2 class="temp4-h2">Headers</h2>
            <h4 class="temp4-h4">You can personalise your Website with your specific type of Headers Design. Header and Navigation are very muchimportant for your website Looks. We have differet header designs collection.</h4>
            <div class="temp4-link">
                <a href="{{ url('/template-list') }}" class="">List of Componets</a>
            </div>
        </div>
    </div>
</div>

<div class="temp5 row">
    <div class="temp5-back">
    </div>

    <div class="container p100_">
        <h3 class="temp5-h3">List of Contact page Designs and Footer Designs</h3>
        <h4 class="temp5-h4">Choose Contact form designs and footer designs from here. You can make complete design of your website.</h4>
        <div class="temp5-link">
            <a href="{{ url('/template-list') }}" class="">Contact Pages</a>
            <a href="{{ url('/template-list') }}" class="">Footer Designs</a>
        </div>
    </div>
</div>

@endsection