@extends('layouts.main')

@section('title')
Dashboard - WebCraft Shop | Build your own website | Websites store India
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

<div class="ni-home"><div class="container">
    <div class="home-box text-center">
        <h2 class="home-h2">Backend Build for Smooth management of data to let You Focus on Sells. It's Secured with Laravel Passport OAuth.</h2>
        <div class="home-link">
            <a href="javascript:void(0)" class="">View Demo</a>
            <a href="{{ url('/dashboard-detail') }}" class="">Dashboard Features</a>
        </div>
        <div class="home-img">
            <img src="public/images/dashboard.png" class="" />
        </div>
    </div>
</div></div>

<div class="ni-sec-1 nis11 p80_">
    <div class="container">
        <div class="ni1-head row">
            <h2 class="ni1-h2 text-center">Dahsboard Categories</h2>
        </div>

        <div class="row ni1-text-cover">
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">E-Commerce Product Dashboard</h3>
                <h4 class="ni1-h4">Managing all Product related Objects, Create as many as Filters and It's types. Discount Coupons feature for your Clients. Add your used to manage Dashboard.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Active/Inactive Support</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Create As much as required</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Update any Time</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Default Filters are already Added</li>
                </ul>
            </div>

            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Bloggers <br>Dashboard</h3>
                <h4 class="ni1-h4">Blogs are made flexible with feature rich Editor in place. It is further supported with Filters and Categories. Media Support Feature added for Blogs Dashboard and Login Authentication security for Comments to avoid Spam.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>All Required Product Details</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Pricing With Multiple Currency</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Options Support</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Multile Images Support</li>
                </ul>
            </div>
            <div class="ni1-text ni1-text-hover col-xs-12 col-sm-4">
                <h3 class="ni1-h3">Company Profile & Profolio Dashboard</h3>
                <h4 class="ni1-h4">Profolio Sites are Serving Purpose of You to connect maximum users on internet. Sites are build to Convay Your Services details and Your Work. Dashbord added with connect feature so you can Stay connected.</h4>
                <ul class="ni1-ul list-unstyled">
                    <li class=""><i class="fa fa-caret-square-right"></i>Easy reply for Messages and Reviews</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Rating support for Reviews</li>
                    <li class=""><i class="fa fa-caret-square-right"></i>Authentication Secured User Inputs</li>
                </ul>
            </div>
        </div>
    </div>
</div>



{{-- <div class="ni-sec-1 nis1 p100_">
    <div class="container">
        <div class="ni1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
        <div class="ni1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="ni1-h2">Product Dashboard</h2>
            <h4 class="ni1-h4">Managing all Product related Objects, Create as many as Filters and It's types. Discount Coupons feature for your Clients. Add your used to manage Dashboard.</h4>
            <ul class="ni1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>Graph Representation To read updates</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Filters &amp; tags</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Product With Multiple Image Support</li>
                <li class=""><i class="fa fa-caret-square-right"></i>SEO management</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Visitors &amp; Profile management</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Messages &amp; Contact</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Social Links &amp; Address Update</li>
            </ul>
            <div class="ni1-link">
                <a href="{{ url('/workflow') }}" class="">Check Demo.!!</a>
            </div>
        </div>
    </div>
</div>

<div class="ni-sec-1 nis2 p100_">
    <div class="container">
        <div class="ni1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="ni1-h2">Blog Dashboard</h2>
            <h4 class="ni1-h4">Blogs are made flexible with feature rich Editor in place. It is further supported with Filters and Categories. Media Support Feature added for Blogs Dashboard and Login Authentication security for Comments to avoid Spam.</h4>
            <ul class="ni1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>Feature Rich Editor For Post</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Format Media Supported</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Filters &amp; tags</li>
                <li class=""><i class="fa fa-caret-square-right"></i>page title Linking with Post Title for SEO</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Along with Site Comments Facebook &amp; Discus Comments</li>
            </ul>
            <div class="ni1-link">
                <a href="{{ url('/workflow') }}" class="">Check Demo.!!</a>
            </div>
        </div>
        <div class="ni1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="ni-sec-1 nis3 p100_">
    <div class="container">
        <div class="ni1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
        <div class="ni1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="ni1-h2">Portfolio Dashboard</h2>
            <h4 class="ni1-h4">Profolio Sites are Serving Purpose of You to connect maximum users on internet. Sites are build to Convay Your Services details and Your Work. Dashbord added with connect feature so you can Stay connected.</h4>
            <ul class="ni1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>Connect Feature</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Social Links &amp; Address Update</li>
                <li class=""><i class="fa fa-caret-square-right"></i>SEO management</li>
            </ul>
            <div class="ni1-link">
                <a href="{{ url('/workflow') }}" class="">Check Demo.!!</a>
            </div>
        </div>
    </div>
</div>

<div class="ni-sec-1 nis4 p100_">
    <div class="container">
        <div class="ni1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="ni1-h2">E-Commerce Dashboard</h2>
            <h4 class="ni1-h4">We want you to Focus on your sells, This Dashboard is Build to give you smooth Product, Order, Sell Management Support. Graphical stat are Designed to give You Complete Brief.</h4>
            <ul class="ni1-ul list-unstyled">
                <li class=""><i class="fa fa-caret-square-right"></i>All features of Product Dashboard</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Multiple Currency Support</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Low Stock Alerts</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Payment Gateway Settings</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Order Management</li>
                <li class=""><i class="fa fa-caret-square-right"></i>Options, tags &amp; types for Product</li>
            </ul>
            <div class="ni1-link">
                <a href="{{ url('/workflow') }}" class="">Check Demo.!!</a>
            </div>
        </div>
        <div class="ni1-img col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <img src="{{ asset('public/images/f1.png') }}" class="img-responsive" />
        </div>
    </div>
</div> --}}


@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#hed1-navbar-collapse').addClass("hed1-col1");
});
</script>
@endsection