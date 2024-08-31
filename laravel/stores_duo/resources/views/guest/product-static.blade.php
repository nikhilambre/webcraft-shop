@extends('layouts.main')

@section('title')
Statc Website - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Static Websites</h2>
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
            <h2 class="ni1-h2 text-center">Static Websites Features</h2>
        </div>

        <div class="row ni1-text-cover">
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">What is Included In <br>Static</h3>
                <h4 class="ni1-h4">We are aware that many time you need a website to share your contact detais. No dynamic content is required Just Your Conpany Details, Some Images and Your Contact Details, Here is the solution.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Home Page, About Us</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>2 More static Pages</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Contact Us page without any Form</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>No dashboard</li>
                </ul>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Static Website Features</h3>
                <h4 class="ni1-h4">These websites may perform low with Search Engines but Many times you need website not get searched in Search Engines but just to let yours land on to Check your Conpany Details from other Platforms.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Readable URLs</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Quality material with Cheap Costing</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Further upgrade to other Plans available</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Access to all available Designs</li>                      
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection