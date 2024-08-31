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

<div class="b46-single-wrap">
    <div class="container">
        @foreach($productData as $product)
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                <div class="col-sm-3">
                    <div class="ad-s-img-opt">
                        <ul class="list-unstyled img-ul">
                            @foreach($productImage as $image)
                            <li class="img-li"><img id="img-{{ $image->id }}" src="../public/storage/product/{{ $image->imageName}}" /></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="ad-s-img">
                        <img id="showcase-image" />
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 col-right">
                <div class="ad-s-text-container">
                    <h3 class="ad-s-h3">{{ $product->productName }}</h3>
                    <div class="item-rat">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star-half"></span>
                    </div>
                    <div class="item-price">
                        <span class="pri-new"><i class="fa fa-{{ $product->currency }}"></i> {{ $product->finalPrice }}</span>
                        <span class="pri-old"><i class="fa fa-{{ $product->currency }}"></i> {{ $product->price }}</span>
                    </div>

                    <div class="item-desc">
                        <p>{{ $product->shortDescription }}</p>
                    </div>

                    <div class="item-btn">
                        <button class="btn btn-1 btn-cart" id="add-cart" title="Add to Cart"><i class="fa fa-shopping-bag"></i> Add to Cart</button>
                        <button class="btn btn-1 btn-buy" id="add-cart-buy" title="Buy Now"><i class="fa fa-check-circle"></i> Buy Now</button>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(){

                            $("#add-cart").click(function(){
                                var optionChecked = new Array();

                                $(".optionClass:checked").each(function() {
                                    optionChecked.push($(this).val());
                                });

                                var token = $('meta[name="csrf-token"]').attr('content');
                                var productId = '{{ $product->id }}';
                                var currency = '{{ $product->currency }}';
                                var cost = '{{ $product->finalPrice }}';

                                if ($('.radio-check:not(:has(:radio:checked))').length) {

                                    $("#notify-box").animate("fast").animate({ opacity : "show" }, "slow");
                                    $('#notify').text('Please Select From All Options.');

                                    $('.item-option h4').addClass('highlight');
                                    setTimeout(function(){
                                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                    }, 6000);

                                } else {
                                    $('.item-option h4').removeClass('highlight');
                                    $.ajax({
                                        type : "POST",
                                        url : "{{ url('/ajax/postcart') }}",
                                        dataType: 'json',
                                        data : { "_token" : token, "optionChecked" : optionChecked, "productId" : productId, "currency" : currency, "productCost" : cost },
                                        success : function(d) {

                                            $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                                            $('#notify').text('Product Added to Your Cart.');
                                            setTimeout(function(){
                                                $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                            }, 6000);
                                        }
                                    });
                                }
                            });

                            $("#add-cart-buy").click(function(){
                                var optionChecked = new Array();

                                $(".optionClass:checked").each(function() {
                                    optionChecked.push($(this).val());
                                });

                                var token = $('meta[name="csrf-token"]').attr('content');
                                var productId = '{{ $product->id }}';
                                var currency = '{{ $product->currency }}';
                                var cost = '{{ $product->finalPrice }}';

                                if ($('.radio-check:not(:has(:radio:checked))').length) {

                                    $("#notify-box").animate("fast").animate({ opacity : "show" }, "slow");
                                    $('#notify').text('Please Select From All Options.');

                                    $('.item-option h4').addClass('highlight');
                                    setTimeout(function(){
                                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                    }, 6000);

                                } else {
                                    $('.item-option h4').removeClass('highlight');
                                    $.ajax({
                                        type : "POST",
                                        url : "{{ url('/ajax/postcart') }}",
                                        dataType: 'json',
                                        data : { "_token" : token, "optionChecked" : optionChecked, "productId" : productId, "currency" : currency, "productCost" : cost },
                                        success : function(d) {
                                            window.location.replace("{{ url('/cart') }}");
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <div class="item-option">
                        <h4>Product is Available in:</h4>
                        @php
                            $arr = [];
                            $i = 0;
                        @endphp
                        @foreach($productoption as $option)

                        @php
                            $arr[$i] = $option->optionName;
                        @endphp

                        @if($i == 0)
                        <div class="radio-check">
                            <section class="slide-three">
                                <input type="radio" name="{{ $option->optionName }}" value="{{ $option->optionTypeId }}" id="option-{{ $option->optionTypeId }}" class="optionClass id-slide-three" />
                                <label for="option-{{ $option->optionTypeId }}">{{ $option->optionName }} : <span>{{ $option->optionTypeName }}</span></label>
                            </section> - {{ $option->typeStock }} Items In Stock<br>
                        @elseif($i != 0)
                            @if($arr[$i-1] != $arr[$i])
                            </div><hr>
                            <div class="radio-check">
                                <section class="slide-three">
                                    <input type="radio" name="{{ $option->optionName }}" value="{{ $option->optionTypeId }}" id="option-{{ $option->optionTypeId }}" class="optionClass id-slide-three" />
                                    <label for="option-{{ $option->optionTypeId }}">{{ $option->optionName }} : <span>{{ $option->optionTypeName }}</span></label>
                                </section> - {{ $option->typeStock }} Items In Stock<br>
                            @else
                                <section class="slide-three">
                                    <input type="radio" name="{{ $option->optionName }}" value="{{ $option->optionTypeId }}" id="option-{{ $option->optionTypeId }}" class="optionClass id-slide-three" />
                                    <label for="option-{{ $option->optionTypeId }}">{{ $option->optionName }} : <span>{{ $option->optionTypeName }}</span></label>
                                </section> - {{ $option->typeStock }} Items In Stock<br>
                            @endif
                        @endif
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 col-left">
                <div class="ad-s-desc-container">
                    <h4 class="dec-h4">Description </h4>
                    <p class="desc-p">{!! $product->description !!}</p>
                </div>

                <div class="rekated-product row">
                    <div class="ad-s-desc-container">
                        <h4 class="dec-h4">Products you may also like </h4>
                    </div>

                    <div class="ad-s-related">
                    </div>
                </div>

                <div class="site-comment">
                    <div class="comment-list sec-s55">
                        <div class="s55-head">
                            <h3 class="head-text">Product Reviews</h3>
                        </div>
                        @if ($productreview->isEmpty())
                            <p class="">No Reviews added.</p>
                        @endif
                        @foreach ($productreview as $review)
                        <div class="row">
                            <div class="comment-img col-sm-1 col-md-2 col-lg-2 col-xs-2">
                                <img class="img-circle" src="../public/storage/user/{{ $review->customerImgName}}">
                            </div>

                            <div class="comment-content col-sm-11 col-md-10 col-lg-10 col-xs-10">
                                <div class="comment-name row">
                                    <p class="name pull-left">{{ $review->name }} {{ $review->lastname }}</p>
                                    <p class="date pull-right">{{ date('d-M', strtotime($review->created_at)) }}</p>
                                </div>
                                <div class="comment-rating">
                                    @for($i = 0; $i < $review->rating; $i++)
                                        @if($review->rating < 3)
                                        <span class="red fa fa-star"></span>
                                        @elseif($review->rating == 3)
                                        <span class="yellow fa fa-star"></span>
                                        @elseif($review->rating > 3)
                                        <span class="green fa fa-star"></span>
                                        @endif
                                    @endfor
                                </div>
                                <div class="comment-text row">
                                    <p class="text">{{ $review->reviewContent }}</p>
                                </div>
                                <div class="comment-link row">
                                    @if ($replycount[$review->id])
                                    <a href="javascript:void(0)" id="show-reply{{ $review->id }}" data-comid="{{ $review->id }}">Show Admin Reply</a>
                                    @endif
                                    <div class="replies" id="replies{{ $review->id }}"></div><!-- Container to show replies list -->
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {

                                $("#show-reply{{ $review->id }}").click(function() {
                                    
                                    var token = $('meta[name="csrf-token"]').attr('content');
                                    var commentId = $(this).attr("data-comid");

                                    $.ajax({
                                        type: "POST",
                                        url: "{{ url('/ajax/getreviewreply') }}",
                                        data: { "_token" : token, "reviewParentId" : commentId },
                                        success: function(d) {
                                            var response = d.reviewReply;

                                            $.each(response, function (index, value) {
                                                var d = new Date(value.created_at);
                                                locale = "en-us";
                                                month = d.toLocaleString(locale, { month: "short" });
                                                date = d.getDate();

                                                var everyReply = '<div class="comment-list sec-s55">\
                                                    <div class="row">\
                                                        <div class="comment-img col-sm-1 col-md-2 col-lg-2 col-xs-2">\
                                                            <img class="img-circle" src="../public/storage/user/'+value.customerImgName+'">\
                                                        </div>\
                                                        <div class="reply-content col-sm-11 col-md-10 col-lg-10 col-xs-10">\
                                                            <div class="comment-name row">\
                                                                <p class="name pull-left">Site Admin</p>\
                                                                <p class="date pull-right">'+date+'-'+month+'</p>\
                                                            </div>\
                                                            <div class="comment-text row">\
                                                                <p class="text">'+value.reviewContent+'</p>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                </div>';
                                                $("#replies{{ $review->id }}").append(everyReply);
                                            });
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                                            $('#notify').text(errorThrown);
                                            setTimeout(function(){
                                                $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                            }, 6000);
                                        }
                                    });
                                    $('#show-reply{{ $review->id }}').off();
                                });

                            });
                        </script>
                        @endforeach
                    </div>

                    <div class="comment-add">
                        <div class="sec-s53">
                            <div class="s53-head">
                                <h3 class="head-text">Add Your Review</h3>
                            </div>
                            <div class="comment-box">
                                <textarea type="textarea" rows="3" 
                                    class="form-control input-lg" 
                                    id="commentContent" 
                                    maxlength="2000" placeholder="Add Review"></textarea>
                            </div>

                            <section class='rating-widget'>
                                <!-- Rating Stars Box -->
                                <div class='rating-stars'>
                                    Your Rating : 
                                    <ul id='stars'>
                                        <li class='star' title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li>
                                        <li class='star' title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li>
                                        <li class='star' title='Good' data-value='3'><i class='fa fa-star fa-fw'></i></li>
                                        <li class='star' title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li>
                                        <li class='star' title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i></li>
                                    </ul>
                                </div>
                            
                                <div class='success-box'>
                                    <div class='clearfix'></div>
                                    <div class='text-message'></div>
                                    <div class='clearfix'></div>
                                </div>
                            </section>

                            <div class="comment-btn">
                                <input type="button" id="save-comment" class="save-comm btn btn-lg" value="Add Review" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-mid">
                <div class="ad-side">
                    <h3 class="side-title">Latest Products</h3>
                    <div class="ab-side-prd">

                        <div class="ad-prd-sugg">
                            <div class="ad-prd-img">
                                <img src="../images/product/" class="img-responsive" />
                            </div>
                            <div class="ad-prd-cont">
                                <h4>Product</h4>
                                <div class="item-price text-left">
                                    <span class="pri-new"><i class="fa fa-inr"></i>55</span>
                                    <span class="pri-old"><i class="fa fa-inr"></i>65</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $productId = $product->id;
@endphp

@endforeach

<script type="text/javascript">

$(document).ready(function(){

    var newSrc = $(".img-ul li:first-child").children().attr('src');
    $("#showcase-image").attr('src', newSrc);

    $("body").on("click", ".img-li img", function() {
        var src = $(this).attr('src'); 
        $("#showcase-image").attr('src', src);
    });


    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
    
        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });
    
    var ratingValue;
    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }
        
        // JUST RESPONSE (Not needed)
        ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        }
        else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }

        $('.success-box').fadeIn(200);  
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    });


    $("#save-comment").click(function() {
        
        var token = $('meta[name="csrf-token"]').attr('content');
        var review = $('textarea#commentContent').val();
        var productId = "<?php echo $productId; ?>";
        var rating = ratingValue;
        
        if (review && rating) {
            $.ajax({
                type: "POST",
                url: "{{ url('/ajax/postreview') }}",
                data: { "_token" : token, "reviewContent" : review, "productId" : productId, 'rating' : rating },
                success: function(d) {

                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                    $('#notify').text('Review Added. Thanks for Review.');
                    setTimeout(function(){
                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                    }, 6000);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                    $('#notify').text(errorThrown);
                    setTimeout(function(){
                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                    }, 6000);
                }
            });
        } else{
            $("#notify-box").animate("fast").animate({ opacity : "show" }, "slow");
            $('#notify').text('Add Review & Ratings to Add.');

            setTimeout(function(){
                $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
            }, 6000);
        }

    });
});
</script>
@endsection