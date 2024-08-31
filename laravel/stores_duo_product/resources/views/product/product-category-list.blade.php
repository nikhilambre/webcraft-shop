@extends('layouts.product')

@foreach ($selectedCategory as $selected)
    @php
    $selectedCategoryId = $selected->id;
    $selectedCategoryName = $selected->categoryName;
    @endphp
@endforeach

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())
{{ $selectedCategoryName }} | {{ $_ENV['APP_NAME'] }}
@endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())
{{ $selectedCategoryName }} | {{ $_ENV['APP_NAME'] }}
@endif
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
@include('shared.header-page')

<section class="phe-s1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-content">
                    <h1 class="head-text banner-product">Products for Category - <span>{{ $selectedCategoryName }}</span></h1>
                    <ul class="breadcumbs list-inline">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Details</li>
                    </ul>
                    <div class="title-line span-after-1">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-image" style="background-image:url('{{ url('public/images/bg30.jpeg') }}')"></div>
</section>

<div class="b89-wrap">
    <div class="container">
        <div class="row">

            <aside class="col-md-3 col-xs-12 col-left">
                <div class="ac-side">
                    <div class="">
                    </div>

                    <h3 class="side-title lead-text">Search By</h3>
                    <div class="site-cat">
                        <div class="cat-title">
                            <h4 class="lead-text">CATEGORIES</h4>
                        </div>
                        <div class="cat-box">
                            <ul class="ac-category list-unstyled">
                                @foreach ($categoryList as $list)
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a class="p-text category-link" href="javascript:void(0)" id="category-id-{{ $list->id }}" data-id="{{ $list->id }}">{{ $list->categoryName }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-md-9 col-xs-12 col-mid">
                <div class="ac-filter">
                    <div class="row">
                        <div class="ac-product-page pull-left">
                            <h3 class="">WebCraft Shop Product List</h3><!-- If Shop link has dropdown then will vary -->
                        </div>
                        <div class="ac-view hidden">
                            <button class="active"><i class="fa fa-th"></i></button>
                            <button class="active"><i class="fa fa-list"></i></button>
                        </div>
                        <div class="ac-sort form-inline pull-right hidden">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Sort By <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Popularity</a></li>
                                    <li><a href="#">New</a></li>
                                    <li><a href="#">Discount</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-pagination pull-right">

                        </div>
                    </div>
                </div>

                <div class="ac-products ac-grid row" id="a-product-list"></div>
                <div class="ac-links text-center" id="product-pagination"></div>

                    {{-- <div class="prod-layout col-md-12 col-xs-12">
                        <div class="item-container">
                            <div class="item-img col-md-5">
                                <img src="public/images/sample/d3.jpg" class="img-responsive" title="">
                            </div>
                            <div class="item-words col-md-7">
                                <h4><a class="lead-text" href="javascript:void(0)">Andouille eu cupidatat caze</a></h4>
                                <div class="item-desc">
                                    <p class="p-text">Andouille eu cupidatat pork belly kevin, picanha sunt hamburger kielbasa.
                                        Tail pancetta sausage, spare ribs flank beef anim. Landjaeger doner est id cow turkey
                                        dolore, short loin pastrami adipisicing. Fatback veniam andouille magna in ali...</p>
                                </div>
                                <div class="item-mark">
                                    <p class="">Available: <span>Immediately</span></p>
                                </div>
                                <div class="item-btn">
                                    <button class="btn btn-1" data-toggle="modal" data-target="#enquiry-modal"><i class="far fa-envelope"></i>Ask for Quote</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                
            </div>

        </div>
    </div>
</div>

@include('product.product-enquiry-modal')

<script type="text/javascript">

    $(document).ready(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var categoryId = '{{ $selectedCategoryId }}';

        $.ajax({
            type : "POST",
            url : "{{ url('/ajax/productlist') }}",
            dataType: 'json',
            data : { "_token" : token, "categoryId" : categoryId },
            success : function(d) {
                $.fn.showProduct(d);
            }
        });
    
        $(".category-link").click(function (){
            var token = $('meta[name="csrf-token"]').attr('content');
            var categoryId = $(this).attr('data-id');
            var categoryVal = $(this).text();

            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/productlist') }}",
                dataType: 'json',
                data : { "_token" : token, "categoryId" : categoryId },
                success : function(d) {
                    $("#a-product-list").empty();
                    $("#product-pagination").empty();
                    $.fn.showProduct(d);
                }
            });

            $('.banner-product span').text(categoryVal);
        });
    
        $.fn.showProduct = function(d){
            var product = d.productListData.data;
            var image = d.productImage;
            var pageurl = '<?php echo url('/'); ?>';
    
            $.each(product, function (index, value) {
    
                var everyProduct = '<div class="prod-layout col-md-12 col-xs-12">\
                        <div class="item-container">\
                            <div class="item-img col-md-5"id="product-image-'+value.id+'"></div>';

                            everyProduct += '<div class="item-words col-md-7">\
                                <h3><a class="lead-text" href="'+pageurl+'/product/'+value.productNameSlug+'">'+value.productName+'</a></h3>\
                                <div class="item-desc">\
                                    <p class="p-text">'+value.shortDescription+'</p>\
                                </div>\
                                <div class="item-mark">\
                                    <p class="">Available: <span>'+value.mark+'</span></p>\
                                </div>\
                                <div class="item-btn">\
                                    <button class="btn btn-enquiry" data-product="'+value.id+'" data-toggle="modal" data-target="#enquiry-modal"><i class="far fa-envelope"></i> Ask for Quote</button>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';

                $("#a-product-list").append(everyProduct);
    
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

        //  On Show Enquiry Model button Click
        $('body').on('click', '.btn-enquiry', function(e) {
            e.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content');
            var productId = $(this).attr('data-product');

            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/getenquiry') }}",
                dataType: 'json',
                data : { "_token" : token, 'id' : productId },
                success : function(d) {
                    $("#modal-product-name").empty();
                    $("#modal-product-img").empty();

                    var product = d.productData;
                    var img = d.productImage;
                    
                    $.each(product, function (i2, v2) {
                        var p = '<h4 class="lead-text">'+v2.productName+'</h4>';
                        $("#modal-product-name").append(p);

                        $.each(img[v2.id], function (i3, v3) {
                            var i = '<img src="'+pageurl+'/public/storage/product/'+v3.imageName+'" class="img-responsive" title="Product Image">';
                            $("modal-product-img").append(i);
                        });

                    });
                }
            });
        });

    });
</script>

@endsection