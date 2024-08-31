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

<div class="phe-s11" style="background-image: url('public/images/bg16.jpg')"><div class="s11-cover">
    <div class="container"><div class="row">
        <div class="s11-b1 text-center">
            <h2 class="b1-h2 head-text">My Shop</h2>
        </div>
    </div></div>
</div></div><!-- Page Header 11 ends Here -->

<div class="b45-wrap">    
    <section class="ac-breadcrum">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                    <ol class="breadcrumb ac-bread">
                      <li class="p-text"><a href="{{ url('/') }}">Home</a></li>
                      <li class="p-text"><a href="{{ url('/shop') }}">Shop</a></li>
                      <li class="active p-text">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">

            <aside class="col-md-3 col-sm-3 col-lg-3 col-xs-12 col-left">
                <div class="ac-side">
                    <div class="">
                    </div>

                    <h3 class="side-title lead-text">Shop By</h3>
                    @foreach($shopFilter as $filter)
                    <div class="site-cat">
                        <div class="cat-title">
                            <h4 class="lead-text">{{ $filter->filterName }}</h4>
                        </div>
                        <div class="cat-box">
                            <ul class="ac-category list-unstyled">
                                @foreach($shopCategory[$filter->id] as $category)
                                <li>
                                    <div class="slide-two">
                                        <input type="checkbox" name="filtList[]" id="cat-{{ $category->id }}" value="{{ $category->id }}" class="id-slide-two filtClass" />
                                        <label for="cat-{{ $category->id }}">{{ $category->categoryName }}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach

                    <h3 class="side-title lead-text">Latest Products</h3>
                    <div class="ac-side-prd">
                        <div class="ac-prd-sugg">
                            <div class="ac-prd-img">
                                <img src="public/images/sample/d1.jpg" class="img-responsive" />
                            </div>
                            <div class="ac-prd-cont">
                                <h4>Goken ruma nitren pikame</h4>
                                <div class="item-price text-left">
                                    <span class="pri-new">$89.60</span>
                                    <span class="pri-old">$122.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="ac-prd-sugg">
                            <div class="ac-prd-img">
                                <img src="public/images/sample/d2.jpg" class="img-responsive" />
                            </div>
                            <div class="ac-prd-cont">
                                <h4>Goken ruma nitren pikame</h4>
                                <div class="item-price text-left">
                                    <span class="pri-new">$89.60</span>
                                    <span class="pri-old">$122.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </aside>

            <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12 col-mid">
                <div class="ac-banner row">
                    <div class="col-sm-12">
                        <img src="public/images/banner4.jpg" class="img-responsive" alt="banner image">
                    </div>
                </div>

                <div class="ac-filter"><div class="row">
                    <div class="ac-product-page pull-left">
                        <h3 class="">My Product List</h3><!-- If Shop link has dropdown then will vary -->
                    </div>
                    <div class="ac-view hidden">
                        <button class="active"><i class="fa fa-th"></i></button>
                        <button class="active"><i class="fa fa-list"></i></button>
                    </div>
                    <div class="ac-sort form-inline pull-right">
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sort By: <span id="sort-active">New</span></a>
                            <ul class="dropdown-menu" role="menu" id="sort-dropdown">
                                <li><a href="javascript:void(0)" id="view">Popularity</a></li>
                                <li><a href="javascript:void(0)" id="new">New</a></li>
                                <li><a href="javascript:void(0)" id="discount">Discount</a></li>
                                <li><a href="javascript:void(0)" id="low">Price- Low to High</a></li>
                                <li><a href="javascript:void(0)" id="high">Price- High to Low</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ac-pagination pull-right">
                        
                    </div>
                </div></div>

                <div class="ac-products ac-grid row" id="a-product-list"></div><!-- Product List renders here -->
                <div class="ac-links text-center" id="product-pagination"></div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

$(document).ready(function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type : "POST",
        url : "{{ url('/ajax/postfilterarray') }}",
        dataType: 'json',
        data : { "_token" : token },
        success : function(d) {
            $.fn.showProduct(d);
        }
    });

    $(".filtClass").click(function (){
        var filtChecked = new Array();

        $(".filtClass:checked").each(function() {
            filtChecked.push($(this).val());
        });

        var token = $('meta[name="csrf-token"]').attr('content');
        var i = 'filter_type_set';

        if (filtChecked != '') {
            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/postfilterarray') }}",
                dataType: 'json',
                data : { "_token" : token, "filterList" : filtChecked, "filterType" : i},
                success : function(d) {
                    $("#product-pagination").empty();
                    $("#a-product-list").empty();
                    $.fn.showProduct(d);
                }
            });
        } else {
            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/postfilterarray') }}",
                dataType: 'json',
                data : { "_token" : token },
                success : function(d) {
                    $("#a-product-list").empty();
                    $("#product-pagination").empty();
                    $.fn.showProduct(d);
                }
            });
        }
    });

    $.fn.showProduct = function(d){
        var product = d.productListData.data;
        var image = d.productImage;
        var price = d.productPrice;
        var pageurl = '<?php echo url('/'); ?>';

        $.each(product, function (index, value) {

            var everyPost = '<div class="prod-layout col-lg-4 col-sm-6 col-xs-6">\
                <div class="item-container">\
                    <div class="item-img" id="product-image-'+value.id+'"></div>';
                    if (value.mark){
                        everyPost += '<span class="item-tag">'+value.mark+'</span>';
                    }
                    everyPost += '<div class="item-words text-center">\
                        <h4><a class="lead-text" href="'+pageurl+'/product/'+value.productNameSlug+'">'+value.productName+'</a></h4>\
                        <div class="item-rat hidden">\
                            <span class="fa fa-star"></span>\
                            <span class="fa fa-star"></span>\
                            <span class="fa fa-star"></span>\
                            <span class="fa fa-star"></span>\
                            <span class="fa fa-star"></span>\
                        </div>\
                        <div class="item-wishlist">\
                            <a href="javascript:void(0)" id="add-wishlist" data-wishlist="'+value.id+'" class="btn btn-default btn-sm add-wishlist" title="Add to Wishlist"><i class="fa fa-plus"></i></a>\
                        </div>\
                        <div class="item-price" id="product-price-'+value.id+'">\
                            <span class="pri-new"><i class="fa fa-'+value.currency+'"></i> '+value.finalPrice+'</span>\
                            <span class="pri-old"><i class="fa fa-'+value.currency+'"></i> '+value.price+'</span>\
                            <span class="pri-discount"> ('+parseInt(value.discount)+'%) OFF</span>\
                        </div>\
                        <div class="item-desc hidden">\
                            <p class="p-text">'+value.shortDescription+'</p>\
                        </div>\
                        <div class="item-btn text-center hidden">\
                            <button class="btn btn-1" data-toggle="tooltip" data-placement="top" title="Ask For Quote"><i class="fa fa-shopping-bag"></i>Ask for Quote</button>\
                        </div>\
                    </div>\
                </div>\
            </div>';

            $("#a-product-list").append(everyPost);

            $.each(image[value.id], function (i2, v2) {
                var everyImage = '<img src="'+pageurl+'/public/storage/product/'+v2.imageName+'" class="img-responsive" title="Product Image">';

                $("#product-image-"+value.id).append(everyImage);
            });

            $("#product-pagination").append(d.links);
        });
    }

    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            type : "POST",
            url : url,
            dataType: 'json',
            data : { "_token" : token },
            success : function(d) {
                $("#a-product-list").empty();
                $("#product-pagination").empty();
                $.fn.showProduct(d);
            }
        });
    });

    $("#sort-dropdown li a").click(function (){
        var sortId = $(this).attr('id');
        var sortVal = $(this).text();

        if(!sortId) {
            sortId = 'id';
        }

        $("#sort-active").text(sortVal);

        var x = "{{ url('/ajax/postfilterarray') }}";
        var y = "?sort="+sortId;
        var url = x + y;

        $.ajax({
            type : "POST",
            url : url,
            dataType: 'json',
            data : { "_token" : token },
            success : function(d) {
                $("#a-product-list").empty();
                $("#product-pagination").empty();
                $.fn.showProduct(d);
            }
        });
    });

    $(document).on("click", ".add-wishlist", function() {
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
});
</script>

@endsection