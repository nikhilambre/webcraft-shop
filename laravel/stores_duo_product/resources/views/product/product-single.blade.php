@extends('layouts.product')

@foreach ($productData as $item)

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())
{{ $item->productName }} | {{ $_ENV['APP_NAME'] }}
@endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())
{{ $item->productName }} | {{ $_ENV['APP_NAME'] }}
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
                    <h1 class="head-text">{{ $item->productName }}</h1>
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

<div class="b89-single-wrap">
    <div class="container">
        <div class="main-col col-md-8 col-xs-12">
            <div class="prod-title">
                <h2 class="head-text">{{ $item->productName }}</h2>
            </div>
            <div class="prod-img">
                @foreach($productImage[$item->id] as $image)
                <img src="{{ url('public/storage/product/'.$image->imageName) }}" class="img-thumbnail">
                @endforeach
            </div>
            <div class="prod-short">
                <p class="lead-text short">{{ $item->shortDescription }}</p>
                <p class="p-text mark"><span>Availability: </span>{{ $item->mark }}</p>
            </div>
            <div class="prod-desc">
                <h4 class="dec-h4">Description </h4>
                <div class="desc-p post-content">{!! $item->description !!}</div>
            </div>
        </div>
        <div class="side-col col-md-4 col-xs-12">
            <div class="site-cat">
                <div class="cat-title">
                    <h4 class="lead-text">Looking for More Details?<br>Send Quotes Request and we will Call You Back.</h4>
                </div>
                <button class="btn-enq btn btn-block btn-lg btn-enquiry" data-product="{{ $item->id }}" data-toggle="modal" data-target="#enquiry-modal"><i class="far fa-envelope"></i> Ask for Quote</button>
            </div>

            <div class="site-cat">
                <div class="cat-title">
                    <h4 class="lead-text">OTHER PRODUCTS FROM CATEGORY</h4>
                </div>
                <ul class="suggestion list-unstyled">
                    @foreach ($relatedProductList as $rel)
                        <li class="">
                            @foreach ($relatedProductImage[$rel->id] as $img)
                            <img src="{{ url('public/storage/product/'.$img->imageName) }}" class="img-thumbnail" >
                            @endforeach
                            <h4 class="lead-text">{{ $rel->productName }}</h4>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="site-cat">
                <div class="cat-title">
                    <h4 class="lead-text">CATEGORIES</h4>
                </div>
                <div class="cat-box">
                    <ul class="ac-category list-unstyled">
                        @foreach ($categoryList as $list)
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a class="p-text category-link" href="{{ url('/category/'.$list->categoryNameSlug) }}" id="category-id-{{ $list->id }}" data-id="{{ $list->id }}">{{ $list->categoryName }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endforeach

@include('product.product-enquiry-modal')

<script type="text/javascript">
    $(function() {

        $('.post-content p:empty').remove();

        //  Remove Attributes
        $('.post-content img').removeAttr('width');
        $('.post-content img').removeAttr('height');

        //  Add Classes
        $('.post-content img').addClass('img-thumbnail');
        $('.post-content table').addClass('table table-hover');
    });
</script>



@endsection