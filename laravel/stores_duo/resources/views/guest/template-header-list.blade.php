@extends('layouts.main')

@section('title')
Header Components - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Header Designs</h2>
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
    <h2 class="head-h2">Landing Page Headers Design List</h2>

    <div class="list row">
        @foreach ($template as $temp)
        <div class="col-xs-12 col-md-4">    
            <div class="box-list">
                <div class="img-box">
                    <img src="{{ asset('public/images/comps/'.$temp->templateImage) }}" >
                </div>
                <div class="head-box text-center">
                    <a href="{{ url('/single-list/desktop/'.$temp->type.'/'.$temp->typeId.'/'.$temp->subType) }}" target="_blank">
                        <h3 class="head">{{ $temp->typeName }}</h3>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center p60_">
        {{ $template->links() }}
    </div>

</div></div>

@endsection