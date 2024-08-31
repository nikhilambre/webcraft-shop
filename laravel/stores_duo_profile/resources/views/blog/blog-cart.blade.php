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

<div class="left col-md-9 col-xs-12">
    <div class="cart-head">
        <h4 class="dec-h4">My Shopping Cart</h4>
    </div>

    <div class="cart-list">
        <ul class="cart-box list-unstyled">
            <li class="list-header">
                <div class="cart-image"><h4>Product Details</h4></div>
                <div class="cart-product"><h4></h4></div>
                <div class="cart-quantity"><h4>Quantity</h4></div>
                <div class="cart-value"><h4 class="text-right">Sub Total</h4></div>
            </li>
            @foreach($cartList as $cart)
            <li class="list-item">
                <div class="cart-image text-center">
                    @foreach($cartImage[$cart->id] as $image)
                    <img class="img-responsive" src="public/storage/product/{{ $image->imageName}}" alt="Product Image">
                    @endforeach
                </div>
                <div class="cart-product">
                    <h3><a href="{{ url('/product/'.$cart->productNameSlug) }}">{{ $cart->productName }}</a></h3>
                    @foreach($cartOption[$cart->id] as $option)
                        @if($option->productId == $cart->productId)
                        <p>{{ $option->optionName }} : {{ $option->optionTypeName }}</p>
                        @endif
                    @endforeach
                    <div class="cart-btn">
                        <a href="javascript:void(0)" id="cart-remove" data-remove="{{ $cart->id }}" class="btn btn-default btn-sm cart-remove">Remove</a>
                        <a href="javascript:void(0)" id="add-wishlist" data-wishlist="{{ $cart->productId }}" class="btn btn-default btn-sm add-wishlist">Add to Wishlist</a>
                    </div>
                </div>
                <div class="cart-quantity text-center">
                    <input type="number" id="qnt-{{ $cart->id }}" class="form-control qnt-number" value="{{ $cart->quantity }}" min="1">
                    <div class="quantity-change"><a href="javascript:void(0)" class="quantity-save" id="quantity-save" data-quantity="{{ $cart->id }}">Save</a></div>
                </div>
                <div class="cart-value text-right">
                    <p class="new"><span class="pri-new"><i class="fa fa-inr"></i> {{ $cart->finalPrice }}</span></p>
                    <p class="old">
                    (@php
                    echo round($cart->discount)
                    @endphp%) Discount | <span class="pri-old"><i class="fa fa-inr"></i> {{ $cart->price }}</span></p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="cart-foot">
        <div class="pull-right">
            <a href="{{ url('/shop') }}" class="btn">Continue Shopping</a>
            <a href="{{ url('/order') }}" class="btn check-out">Proceed to CheckOut</a>
        </div>
    </div>
</div>

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
          <hr>
          @if(!$couponDiscount)
          <dt class="show-coupons">Apply Coupon Code</dt><br><dd></dd>
          <dt id="coupon-box-dt"></dt><dd id="coupon-box-dd"></dd>
          @endif
          @if($couponDiscount)
          <dt class="show-coupons">Change Coupon Code</dt><br><dd></dd>
          <dt id="coupon-box-dt"></dt><dd id="coupon-box-dd"></dd>
          @endif
        </dl>
    </div>
</div>

</div></div>

<script type="text/javascript">
    $(document).ready(function() {

        $(".cart-remove").click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var remove = $(this).attr("data-remove");

            $.ajax({
                type: "POST",
                url: "{{ url('/ajax/cartremove') }}",
                data: { "_token" : token, "removeId" : remove },
                success : function(d) {
                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                    $('#notify').text('Product Removed From Cart Successfully.');
                    setTimeout(function(){
                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                        location.reload();
                    }, 2000);
                }
            });
        });

        $(".add-wishlist").click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var productId = $(this).attr("data-wishlist");

            $.ajax({
                type: "POST",
                url: "{{ url('/ajax/addwishlist') }}",
                data: { "_token" : token, "productId" : productId },
                success : function(d) {
                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                    $('#notify').text('Product Added to Your Wishlist.');
                    setTimeout(function(){
                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                    }, 6000);
                }
            });
        });

        $(".quantity-save").click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var productCode = $(this).attr("data-quantity");

            var quantity = $('#qnt-'+ productCode).val();

            $.ajax({
                type: "POST",
                url: "{{ url('/ajax/cartquantity') }}",
                data: { "_token" : token, "quantity" : quantity, 'cartId' : productCode },
                success : function(d) {
                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                    $('#notify').text('Product Quantity Updated Successfully.');
                    setTimeout(function(){
                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                        location.reload();
                    }, 2000);
                }
            });
        });

        $(".show-coupons").click(function() {
            var cover1 = $('#coupons-code');
            var cover2 = $('#add-coupons');

            if(cover1.length < 1 && cover2.length < 1) {
                $("#coupon-box-dt").append('<input type="text" id="coupons-code" class="form-control coupons-code">');
                $("#coupon-box-dd").append('<a href="javascript:void(0)" id="add-coupons" class="btn btn-default">Apply</a>');
            }
        });

        $(document).on("click", "#add-coupons" , function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var coupon = $('#coupons-code').val();

            if (coupon) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/ajax/addcoupon') }}",
                    data: { "_token" : token, "coupon" : coupon },
                    success : function(d) {
                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                        $('#notify').text('Coupon Code Applied to Cart.');
                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                            location.reload();
                        }, 6000);
                    }
                });
            } else {
                $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                $('#notify').text('Please Add Coupon Code.');
                setTimeout(function(){
                    $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                }, 6000);
            }
        });

    });
</script>
@endsection