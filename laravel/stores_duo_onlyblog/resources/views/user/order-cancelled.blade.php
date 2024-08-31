@extends('layouts.user')

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

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">Cancel Order</h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-list"><div class="container">

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">
        <h3 class="h3-head">Order is cancelled.</h3>
        <h4 class="h4-head">ORDER ID : {{ $orderId }}</h4><br><br>

        <p>Your order is cancelled and billng status:</p>
        <br>
        <p>In case of anu query reach us at Email: info@storesbuzz.com</p>

        <div class="nx-links">
            <a href="{{ url('/order/list') }}" class="nx-btn btn-lg" id="save-call">Orders List</a>
        </div>

    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
    </div>
    
</div></div>

@endsection