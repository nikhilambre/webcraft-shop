@extends('layouts.main')

@section('title')
Custome Order - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Custom Order</h2>
            <p class="home-p">We are working to add quality features to WebCraft Shop which in turn will simplify your work and can bring more leads to you.</p>
            <div class="home-link">
                <a href="{{ url('/pricing-detail') }}" class="">Pricing in Detail</a>
                <a href="{{ url('/feature-detail') }}" class="first">Designs</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="nc-sec-5">
    <div class="container">
        <div class=" col-xs-12 col-sm-8 col-sm-offset-2 text-center">
            <h2 class="nc5-h2">Looking for Website as per Your Thoughts?</h2>
            <h4 class="nc5-h4">Discuss Your Ideas with Us and We will Build Website for You Or If you Looking for Re-building Your website, WebCraft Shop will Be Best Option for you.</h4>
            <h4 class="nc5-h4">For Custom Websites we will Build and Handover all Source Code to You and You as owner &amp; You can host it as you prefer. Website will be based on Laravel Framework. Costing will based on COmplexity and Time Involved.</h4>
            <br><hr><br>
            <h4 class="nc5-ph4">If You Have Got Order Code from Us, Create Custom Order Here</h4>
            <form class="edit p20_" action="{{ route('get.order-update-custom') }}" method="GET">
                <div class="form-group row">
                    <input type="text" class="form-control input-lg" placeholder="Order Code Here" name="orderCode" maxlength="20" required>
                </div>
                <div class="form-group row p20_">
                    @if(Auth::guard('customer')->check())
                    <input type="submit" name="submit" class="btn btn-default btn-lg" value="Create Custom Order" />
                    @else
                    <a href="javascript:void(0)" rel="link" class="nc5-link" data-toggle="modal" data-target="#signup-modal">Create Custom Order</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection