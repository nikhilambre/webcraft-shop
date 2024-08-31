@extends('layouts.main')

@section('title')
Blogs - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">404 Not Found</h2>
            <p class="home-p">Oops! We have an Error.</p>
            <div class="home-link">
                <a href="{{ url('/') }}" class="">Home</a>
                <a href="{{ url('/template') }}" class="first">Templates</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

@endsection