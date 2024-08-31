@extends('layouts.main')

@section('title')
Component Type - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Component Designs</h2>
            <p class="home-p">We are Supporting all Major type of Websites for Now and In Up Coming versions we are willing to add More Components and Types of Featured Websites.</p>
            <div class="home-link">
                <a href="javascript:void(0)" class="">How We Do It</a>
                <a href="javascript:void(0)" class="first">Designs</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="design-list"><div class="container">
    <h2 class="head-h2">Component Type List</h2>

    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/1') }}">
                    <h3 class="box-h3">Page Componenets</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/2') }}">
                    <h3 class="box-h3">Page Tag Lines</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/3') }}">
                    <h3 class="box-h3">Carousals Componenets</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/4') }}">
                    <h3 class="box-h3">Testimonial Componenets</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/5') }}">
                    <h3 class="box-h3">Portfolio Componenets</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/6') }}">
                    <h3 class="box-h3">Blog Page Componenets</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/7') }}">
                    <h3 class="box-h3">Ecommerce Componenets</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">    
        <div class="box">
            <div class="h3-wrap">
                <a href="{{ url('/template-list/component-list/9') }}">
                    <h3 class="box-h3">Other Page Componenets</h3>
                </a>
            </div>
        </div>
    </div>

</div></div>
@endsection