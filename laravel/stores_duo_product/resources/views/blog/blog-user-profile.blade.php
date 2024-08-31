@extends('layouts.blog')

@section('title')
Profile Page
@endsection

@section('description')
Website description
@endsection

@section('keywords')
website keywords
@endsection

@section('page-image')
{{ asset('public/images/logo.jpg') }}
@endsection


@section('html-content')
@include('blog.header-home')

@foreach($customer as $cust)
<div class="container"><div class="row">
    <div class="sec-s59">
    <div class="profile-left col-md-3 col-xs-12">
        <div class="profile-img">
            <img src="public/storage/user/{{ $cust->customerImgName }}" class="img-thumbnail" alt="Profile Image">
            <p>Member Since: {{ date('d-M-y', strtotime($cust->created_at)) }}</p> 
            <a href="{{ url('/profile-edit') }}" class="btn btn-default">Edit Profile</a>
        </div>
    </div>
    <div class="profile-right col-md-9 col-xs-12">
        <div class="profile-name row">
            <h2>{{ ucfirst($cust->name) }} {{ ucfirst($cust->lastname) }}</h2>
        </div>

        <div class="profile-info p20">
            <h3>Personal Info</h3>
            <dl class="dl-horizontal">
                <dt class="email">Email Id :</dt>
                    <dd>{{ $cust->email }}</dd>
                <dt class="gender">Contact No :</dt>
                    <dd>{{ $cust->contact_no }}</dd>
            </dl>
            <hr>
            <h3>Delivery Address</h3>
            <dl class="dl-horizontal">
                <dt class="email">Address :</dt>
                    <dd>{{ $cust->addrText }}</dd>
                <dt class="email">City :</dt>
                    <dd>{{ $cust->addrCity }}</dd>
                <dt class="email">State :</dt>
                    <dd>{{ $cust->addrState }}</dd>
                <dt class="email">Country :</dt>
                    <dd>{{ $cust->addrCountry }}</dd>
                <dt class="email">Pincode :</dt>
                    <dd>{{ $cust->addrPincode }}</dd>
            </dl>
            <hr>
        </div>
        <div class="profile-order">
            <h3 class="order-head">Orders</h3>

            @foreach($order as $ord)
            <div class="order-data">
                <h3 class="">Order Code: {{ $ord->orderCode }}</h3>
                <p class="">Order Placed On: {{ date('d-M-y', strtotime($ord->created_at)) }}</p>
            </div>
            @foreach($cartData[$ord->id] as $cart)
            <div class="cart-data">
                <div class="cart-product row">
                    <div class="cart-img col-md-3">
                        @foreach($cartImage[$cart->id] as $image)
                        <img src="public/storage/product/{{ $image->imageName }}" class="img-thumbnail" alt="cart product image">
                        @endforeach
                    </div>
                    <div class="cart-details col-md-9">
                        <h3 class=""><a href="{{ url('public/product/'.$cart->productNameSlug) }}">{{ $cart->productName }}</a></h3>
                        <p class="">Quantity: <span>{{ $cart->quantity }}</span></p>
                        <p class="">Price Paid: <span><i class="fa fa-{{ $cart->currency }}"></i>{{ $cart->productCost }}</span></p>
                        <p class="">Status: <span>{{ $cart->deliveryStatus }}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
            {{ $order->links() }}
        </div>
    </div>
    </div>
</div></div>
@endforeach

@endsection