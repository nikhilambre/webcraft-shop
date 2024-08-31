@extends('layouts.main')

@section('title')
User Profile - WebCraft Shop | Build your own website | Websites store India
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

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">My Account</h2>
        <h3>WebCraft Shop values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-list"><div class="container">
    
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">
        <h4>Personal Info: </h4>
        @foreach ($customer as $cust)
        <dl class="dl-horizontal">
            <dt>First Name :</dt><dd>{{ $cust->name }}</dd>
            <dt>Last Name :</dt><dd>{{ $cust->lastname }}</dd>
            <dt>Email ID :</dt><dd>{{ $cust->email }}</dd>
            <dt>Account Created Date :</dt><dd>{{ $cust->created_at }}</dd>
        </dl>
        @endforeach

        <h4>Personal Address: </h4>
        @if (!$customeraddr->isEmpty())
            @foreach ($customeraddr as $addr)
            <dl class="dl-horizontal">
                <dt>Address :</dt><dd>{{ $addr->addrText }}</dd>
                <dt>City :</dt><dd>{{ $addr->addrCity }}</dd>
                <dt>State :</dt><dd>{{ $addr->addrState }}</dd>
                <dt>Country :</dt><dd>{{ $addr->addrCountry }}</dd>
                <dt>Pin Code :</dt><dd>{{ $addr->addrPincode }}</dd>
                <dt>Contact No :</dt><dd>{{ $addr->addrContactNo }}</dd>
                <dt>Other Contact :</dt><dd>{{ $addr->addrChat }}</dd>
            </dl>
            
            <div class="nx-links">
                <a href="{{ url('/order/address/delete/'.$addr->id) }}" class="nx-btn btn-lg"><i class="fa fa-close"></i> Remove</a>
                <a href="{{ url('/order/address/edit') }}" class="nx-btn btn-lg"><i class="fa fa-edit"></i> Edit</a>
            </div>
            @endforeach
        @else
            <dl class="dl-horizontal">Address not updated.</dl>
            <div class="nx-links">
                <a href="{{ url('/order/address/create') }}" class="nx-btn btn-lg">Add Address</a>
            </div>
        @endif
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
    </div>

</div></div>
@endsection