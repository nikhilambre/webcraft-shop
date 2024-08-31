@extends('layouts.main')

@section('title')
Templates - WebCraft Shop | Build your own website | Websites store India
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

<div class="nt-home">
    <div class="nt-back"></div>
    <div class="container">
        <div class="home-box">
            <h2 class="home-h2">Templates</h2>
            <p class="home-p">We are Supporting all Major type of Websites for Now and In Up Coming versions we are willing to add More Components and Types of Featured Websites.</p>
            <div class="home-link">
                <a href="javascript:void(0)" class="first">Check Our Work</a>
                <a href="javascript:void(0)" class="">Check Designs</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="nt-sec-1"><div class="container">
    <h2 class="nt1-h2 text-center">Templates are available in following Categories</h2>
    <div class="nt1-box">
        <div class="col-xs-12 col-md-4">
            <div class="box">
                <span class="fa fa-chess-king"></span>
                <h3 class="box-h3">Landing Page Header Designs</h3>
                <a href="{{ url('/template-list/header') }}" rel="" class="box-a">View All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="box">
                <span class="fa fa-chess"></span>
                <h3 class="box-h3">Page Footer <br>Designs</h3>
                <a href="{{ url('/template-list/footer') }}" rel="" class="box-a">View All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="box">
                <span class="fa fa-chess-queen"></span>
                <h3 class="box-h3">Components <br>List</h3>
                <a href="{{ url('/template-list/component-list') }}" rel="" class="box-a">View All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="box">
                <span class="fa fa-chess-knight"></span>
                <h3 class="box-h3">Page Header <br>Designs</h3>
                <a href="{{ url('/template-list/pageheader') }}" rel="" class="box-a">View All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="box">
                <span class="fa fa-chess-rook"></span>
                <h3 class="box-h3">Contact Us Page <br>Designs</h3>
                <a href="{{ url('/template-list/contact') }}" rel="" class="box-a">View All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="box">
                <span class="fa fa-chess-bishop"></span>
                <h3 class="box-h3">Sidebar Sections <br>Designs</h3>
                <a href="{{ url('/template-list/sidebar') }}" rel="" class="box-a">View All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div></div>

<div class="nb-sec-5"><div class="container">
    <div class="col-left col-md-5 col-sm-6 col-lg-5 col-xs-12">
        <h2 class="nb5-h2">100's of Template Components are available at WebCraft Shop</h2>
        <h4 class="nb5-h4">We have categorized templates as Header, Footer, and Page Components etc. Components are built to support wide range of website requirements. It is also considered that they have to accommodate variety of Content.</h4>
    </div>
    <div class="col-right col-md-7 col-sm-6 col-lg-7 col-xs-12">
        <img src="public/images/iPhone.png" class="img-responsive">
    </div>
</div></div>

<div class="nb-sec-1"><div class="container">
    <div class="col-right col-md-7 col-sm-6 col-lg-7 col-xs-12">
        <img src="public/images/iPhone.png" class="img-responsive">
    </div>
    <div class="nb1-text col-md-5 col-sm-6 col-lg-5 col-xs-12">
        <h2 class="nb1-h2">How to choose what you Need?</h2>
        <h4 class="nb1-h4">Front end content update by user is made easy. Just login to dashboard and you can edit live website content. No need to contact Storesbuzz. You can add new text or remove old anytime.</h4>
    </div>
</div></div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#hed1-navbar-collapse').addClass("hed1-col1");
    });
</script>
@endsection