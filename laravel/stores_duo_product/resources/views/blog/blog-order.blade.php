@extends('layouts.blog')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())Populer Blogs Page @endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())Website description @endif
@endsection


@section('keywords')
@foreach ($seo as $s)
{{ $s->keyword }}
@endforeach
@if ($seo->isEmpty())website keywords @endif
@endsection


@section('page-image')
@foreach ($seo as $s)
{{ asset('public/images/'.$s->ogImgName) }}
@endforeach
@if ($seo->isEmpty()){{ asset('public/images/logo.jpg') }} @endif
@endsection


@section('og-facebook')
@foreach ($seo as $s)
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $s->title }}" />
<meta property="og:description" content="{{ $s->description }}" />
<meta property="og:image" content="{{ asset('public/images/'.$s->ogImgName) }}">
@endforeach
@endsection


@section('og-twitter')
@foreach ($seo as $s)
@if ($s->twitterCardType == 'summary_large_image')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $s->twitterSite }}">
<meta name="twitter:creator" content="{{ $s->twitterCreator }}">
<meta name="twitter:title" content="{{ $s->title }}">
<meta name="twitter:description" content="{{ $s->description }}">
<meta name="twitter:image" content="{{ asset('public/images/'.$s->ogImgName) }}">

@elseif ($s->twitterCardType == 'summary')
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ $s->twitterSite }}">
<meta name="twitter:title" content="{{ $s->title }}">
<meta name="twitter:description" content="{{ $s->description }}">
<meta name="twitter:image" content="{{ asset('public/images/'.$s->ogImgName) }}">

@elseif ($s->twitterCardType == 'app')
<meta name="twitter:card" content="app">
<meta name="twitter:site" content="{{ $s->twitterSite }}">
<meta name="twitter:description" content="{{ $s->description }}">
<meta name="twitter:app:country" content="{{ $s->twitterAppCountry }}">
<meta name="twitter:app:name:iphone" content="{{ $s->twitterAppNameIphone }}">
<meta name="twitter:app:id:iphone" content="{{ $s->twitterAppIdIphone }}">
<meta name="twitter:app:url:iphone" content="{{ $s->twitterAppUrlIphone }}">
<meta name="twitter:app:name:ipad" content="{{ $s->twitterAppNameIpad }}">
<meta name="twitter:app:id:ipad" content="{{ $s->twitterAppIdIpad }}">
<meta name="twitter:app:url:ipad" content="{{ $s->twitterAppUrlIpad }}">
<meta name="twitter:app:name:googleplay" content="{{ $s->twitterAppNameGoogleplay }}">
<meta name="twitter:app:id:googleplay" content="{{ $s->twitterAppIdGoogleplay }}">
<meta name="twitter:app:url:googleplay" content="{{ $s->twitterAppUrlGoogleplay }}">
@endif
@endforeach
@endsection


@section('html-content')
@include('blog.header-home')

<div class="b46-cart-wrap"><div class="container">

@foreach($customer as $cust)
<div class="left col-md-9 col-xs-12">
    <div class="cart-head">
        <h4 class="dec-h4">Place Order</h4>
    </div>

    <div class="order-form sec-s57">
        <form class="" action="{{ url('order') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="form-subheader">Personal Details:</h3>

            <div class="form-group row">
                <label for="orderName" class="hidden-xs col-md-3 text-right">* Full Name: </label>
                <div class="col-xs-12 col-md-9">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Full Name (This will be used in Invoice)"
                        name="orderName" id="orderName"
                        maxlength="60" required value="{{ $cust->name }} {{ $cust->lastname }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="orderEmail" class="hidden-xs col-md-3 text-right">* Email Id: </label>
                <div class="col-xs-12 col-md-9">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Email Id"
                        name="orderEmail" id="orderEmail"
                        maxlength="100" required value="{{ $cust->email }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="orderContactNo" class="hidden-xs col-md-3 text-right">* Contact Number: </label>
                <div class="col-xs-12 col-md-9">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Mobile Number"
                        name="orderContactNo" id="orderContactNo" 
                        maxlength="18" required pattern="[0-9]" value="{{ $cust->contact_no }}">
                    <p class="pull-right"></p>
                </div>
            </div>

            <h3 class="form-subheader">Order Delivery Address:</h3>

            <div class="form-group row">
                <label for="addrText" class="hidden-xs col-md-3 text-right">* Address: </label>
                <div class="col-xs-12 col-md-9">
                    <textarea 
                        class="textarea form-control input-lg" rows="3" placeholder="* Address"
                        name="addrText" maxlength="150" id="addrText"  
                        required>{{ $cust->addrText }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrCity" class="hidden-xs col-md-3 text-right">* City: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* City"
                        name="addrCity" id="addrCity" 
                        maxlength="30" required value="{{ $cust->addrCity }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrState" class="hidden-xs col-md-3 text-right">* State: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* State"
                        name="addrState" id="addrState" 
                        maxlength="30" required value="{{ $cust->addrState }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrCountry" class="hidden-xs col-md-3 text-right">* Country: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Country"
                        name="addrCountry" id="addrCountry" 
                        maxlength="40" required value="{{ $cust->addrCountry }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrPincode" class="hidden-xs col-md-3 text-right">* Pincode: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Pincode"
                        name="addrPincode" id="addrPincode" 
                        maxlength="15" required value="{{ $cust->addrPincode }}">
                    <p class="pull-right"></p>
                </div>
            </div>

            <input type="hidden" class="hidden" placeholder="*Currency" name="orderCurrency" required disabled value="{{ $currency }}">
            <input type="hidden" class="hidden" placeholder="*Cost" name="orderCost" required disabled value="{{ $totalPrice }}">

            <div class="form-group row p20_">
                <hr>
                <input type="checkbox" name="orderTerms" id="orderTerms" value="1" require></input>
                <p class="terms">I have read and agree with WebCraft's terms and conditions.</p><br><br>

                <input type="submit" name="submit" class="btn btn-default btn-lg" id="order-active" value="Place Order" />
            </div>
        </form>
    </div>
</div>
@endforeach

<div class="right col-md-3 col-xs-12">
    <div class="cart-head">
        <h4 class="dec-h4">Price Details</h4>
    </div>

    <div class="price-list">
        <dl class="dl-horizontal">
          <dt>Cart Total</dt><dd><i class="fa fa-{{ $currency }}"></i> {{ $price }}</dd>
          <dt class="green">Bag Discount</dt><dd class="green">- <i class="fa fa-{{ $currency }}"></i> {{ $discount }}</dd>
          <dt class="red">Estimated Tax</dt><dd class="red"><i class="fa fa-{{ $currency }}"></i> {{ $tax }}</dd>
          @if($couponDiscount)
          <dt class="green">Coupon Discount</dt><dd class="green">- <i class="fa fa-{{ $currency }}"></i> {{ $couponDiscount }}</dd>
          @endif
          <dt>Delivery</dt>
            @if($deliveryCharge == 0)
            <dd class="green"> FREE
            @elseif($deliveryCharge > 0)
            <dd class=""><i class="fa fa-{{ $currency }}"></i> {{ $deliveryCharge }}
            @endif
            </dd>
          <hr>
          <dt>Order Total</dt><dd><i class="fa fa-{{ $currency }}"></i> {{ $totalPrice }}</dd>
        </dl>
    </div>

</div>

</div></div>

@endsection