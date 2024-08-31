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
        <h2 class="home-h2">Your Order Status</h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>


@foreach ($orders as $order)
<div class="nx-status"><div class="container p40_">
    <h3>Order Details: </h3>

    <div class="status-top">
        <div class="order-group row p5_">
            <p class="or-head col-xs-12 col-sm-2 col-md-2 col-lg-2">Order ID: </p>
            <p class="or-stat col-xs-12 col-sm-10 col-md-10 col-lg-10">{{ $order->orderCode }}</p>
        </div>

        <div class="order-group row p5_">
            <p class="or-head col-xs-12 col-sm-2 col-md-2 col-lg-2">Display Link: </p>
            <p class="or-stat col-xs-12 col-sm-10 col-md-10 col-lg-10"><a href="{{ $order->orderData1 }}">{{ $order->orderData1 }}</a></p>
        </div>

        <div class="order-group row p5_">
            <p class="or-head col-xs-12 col-sm-2 col-md-2 col-lg-2">Type: </p>
            <p class="or-stat col-xs-12 col-sm-6 col-md-6 col-lg-6">
            @if ($order->productCode == 'SHOWCASE')
                Company Profile Static
            @elseif ($order->productCode == 'PROFILE')
                Company Profile with Dashboard
            @elseif ($order->productCode == 'BLOG')
                Blogging Website
            @elseif ($order->productCode == 'ECOMMERCE')
                E-Commerce Website
            @elseif ($order->productCode == 'CUSTOM')
                Custom Website
            @endif
            </p>

            <p class="or-head col-xs-12 col-sm-2 col-md-2 col-lg-2">Date Created: </p>
            <p class="or-stat col-xs-12 col-sm-2 col-md-2 col-lg-2">{{ $order->created_at }}</p>
        </div>

        <div class="order-group row p5_">
            <p class="or-head col-xs-12 col-sm-2 col-md-2 col-lg-2">Description: </p>
            <p class="or-stat col-xs-12 col-sm-10 col-md-10 col-lg-10">{{ $order->orderDescription }}</p>
        </div>
    </div>

    <h3>Requirements: </h3>
    <div class="require-top">
        <h4>Status of Data required for completion of order you can find <a href="{{ url('/order/requirements/'.$order->id.'/'.$order->orderCode) }}">here</a></h4>
    </div>

    <div class="require-top">
        <h5>Your Selected Components</h5>
        @foreach ($choices as $choice)
        <div class="order-group col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="order-box">
                <p class="or-head">{{ $choice->typeName }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div></div>

<div class="nx-comments"><div class="container p20_">

    <div class="nx-com-list col-xs-12 col-sm-8 col-md-7 col-lg-7">

        <h3>Message for Developers:</h3>

        <ul class="comment-ul list-unstyled">
            @if (count($comments))
            @foreach ($comments as $comment)
            <li class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 p0">
                    <p class="com-name">{{ $comment->commentName }} :</p>
                </div>

                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <p class="com-value">{{ $comment->commentText }}</p>
                    <span class="com-date">{{ $comment->created_at }}</span>
                </div>
            </li>
            @endforeach
            @else
                <p>No Comments Added.</p>
            @endif  
            <li class="row hidden" id="com-added">
                <p class="com-name col-xs-2 col-sm-2 col-md-2 col-lg-2">Me : </p>
                <p class="com-from col-xs-10 col-sm-10 col-md-10 col-lg-10" id="new-com"></p>
                <p class="com-date hidden-xs">Just Now</p>
            </li><hr>
            <li>
                <form class="" name="form-comm" method="post">
                    <div class="form-group row p10_">
                        <label for="commentText" class="com-name hidden-xs col-sm-2 col-md-2 col-lg-2">Message : </label>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control input-lg" id="commentText" maxlength="400" placeholder="Your Message here">
                        </div>
                    </div>

                    <div class="row">
                        <label class="com-name hidden-xs col-sm-2 col-md-2 col-lg-2">&nbsp;</label>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                            <input type="button" id="save-comm" class="save-comm btn btn-lg" value="Send" />
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <div class="nx-com-help col-xs-12 col-sm-5 col-md-5 col-lg-5">
        <h3>Helpfull Links</h3>

        <ul class="list-unstyled">
            <li><i class="fa fa-truck"></i><a href="#">How to select domain name?</a></li>
            <li><i class="fa fa-truck"></i><a href="#">How to select title, keywords & description for better SEO performance?</a></li>
            <li><i class="fa fa-truck"></i><a href="#">Products by StoresBuzz.</a></li>
            <li><i class="fa fa-truck"></i><a href="#">How to apply for payment gateway in India (CCAVENUE PG)?</a></li>
            <li><i class="fa fa-truck"></i><a href="#">How to add google analytics to your website?</a></li>
            <li><i class="fa fa-truck"></i><a href="#">How to get code for tawk.to for chat integration?</a></li>
        </ul><br><br>

        <h3>Cancel Order</h3>
        <a href="{{ url('/order/cancel/'.$order->id) }}" class="btn btn-lg">Cancel Order</a><br><br>
        <p>Check Our <a href="{{ url('/refund') }}">Refund policy</a> here</p>

        
    </div>
</div></div>

@php
    $orderId = $order->id;
@endphp

@endforeach

<script type="text/javascript">
    $(document).ready(function() {
    
        $("#save-comm").click(function() {
            
            var token = $('meta[name="csrf-token"]').attr('content');
            var name = 'Me';
            var comment = $('#commentText').val();
            
            if (comment) {
                $.ajax({
                    type : "POST",
                    url : "{{ url('/ajax/savecomment/'.$orderId) }}",
                    data : { "_token" : token, "commentText" : comment, "commentName" : name},
                    success : function(d) {
                        $('#com-added').removeClass("hidden");
                        $('#new-com').html(d);

                        $('#notify-box').animate("fast").animate({
                            opacity : "show"
                        }, "slow");

                        $('#notify').text('Comment Saved successfully.');

                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }, 6000);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $('#notify-box').animate("fast").animate({
                            opacity : "show"
                        }, "slow");

                        $("#notify").text(errorThrown);

                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }, 6000);
                    }
                });
            } else{
                $('#notify-box').animate("fast").animate({
                    opacity : "show"
                }, "slow");

                $('#notify').text('Add a comment to save.');

                setTimeout(function(){
                    $('#notify-box').animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }, 6000);
            }
        });
    
    
    });
</script>

@endsection

