@extends('layouts.product')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())
Home Page | {{ $_ENV['APP_NAME'] }};
@endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())
Home | {{ $_ENV['APP_NAME'] }};
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
@include('shared.header-home')

<div class="sec-s82">
    <div class="container">
        <div class="left col-md-7 col-xs-12">
            <div class="head-wrap">
                <h2 class="head-text" data-section="1018">{!! $sc['1018'] !!}</h2>
                <p class="p-text" data-section="1017">{!! $sc['1017'] !!}</p>
            </div>

            <div class="box-wrap">
                <div class="row">
                    <div class="box col-xs-12 col-md-6">
                        <h3 class="head-text"><i class="fa fa-clone"></i> <span data-section="1016">{!! $sc['1016'] !!}</span></h3>
                        <p class="p-text" data-section="1015">{!! $sc['1015'] !!}</p>
                    </div>
                    <div class="box col-xs-12 col-md-6">
                        <h3 class="head-text"><i class="fab fa-fly"></i> <span data-section="1014">{!! $sc['1014'] !!}</span></h3>
                        <p class="p-text" data-section="1013">{!! $sc['1013'] !!}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="box col-xs-12 col-md-6">
                        <h3 class="head-text"><i class="fab fa-codepen"></i> <span data-section="1012">{!! $sc['1012'] !!}</span></h3>
                        <p class="p-text" data-section="1011">{!! $sc['1011'] !!}</p>
                    </div>
                    <div class="box col-xs-12 col-md-6">
                        <h3 class="head-text"><i class="fa fa-gift"></i> <span data-section="1010">{!! $sc['1010'] !!}</span></h3>
                        <p class="p-text" data-section="1009">{!! $sc['1009'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right col-md-5 col-xs-12">
            <img data-imgsection="1019" src="{{ url('public/storage/page/').'/'.$sc['1019'] }}" class="img-thumbnail">
        </div>
    </div>
</div>

<div class="sec-s86">
    <div class="container text-center">
        <h4 class="lead-text" data-section="1007">{!! $sc['1007'] !!}</h4>
        <h2 class="head-text" data-section="1008">{!! $sc['1008'] !!}</h2>
    </div>
</div>

<div class="sec-s87">
    <div class="container text-center">
        <div class="page-head">
            <h2 class="head-text" data-section="1005">{!! $sc['1005'] !!}</h2>
            <p class="p-text" data-section="1006">{!! $sc['1006'] !!}</p>
        </div>

        <div id="carousel-example-generic" class="se-87-carousel carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
        
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                @foreach ($productListData as $item)
                    <div class="item">
                        <div class="col-md-6">
                            <div class="carousel-caption">
                                @foreach ($productCategory[$item->id] as $cat)
                                <p class="carousel-p">{{ $cat->categoryName }}</p>    
                                @endforeach
                                <h2 class="carousel-head" data-animation="animated bounceInLeft">{{ $item->productName }}</h2>
                                <p class="carousal-desc" data-animation="animated bounceInLeft">{{ $item->shortDescription }}</p>
                                <a href="{{ url('/product/'.$item->productNameSlug) }}" class="carousel-link btn btn-default">Check Details</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                @foreach ($productImage[$item->id] as $cat)
                                <img data-animation="animated zoomInUp" class="img" src="{{ url('public/storage/product/'.$cat->imageName) }}" alt="product Image">
                                @endforeach
                            </div>
                        </div>
                    </div>                    
                @endforeach
                
            </div>
        </div>

    </div>
</div>

<div class="b39-wrap"><div class="container">
    <div class="col-md-6 col-xs-12">
        <div class="box-left text-center">
            <img data-imgsection="1004" class="b39-img" src="{{ url('public/storage/page/').'/'.$sc['1004'] }}" alt="category most viewed">
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box-right">
            <h3 class="head-text" data-section="1000">{!! $sc['1000'] !!}</h3>
            <p class="p-text" data-section="1001">{!! $sc['1001'] !!}</p>
            <ul class="ul-list list-unstyled" data-section="1003">{!! $sc['1003'] !!}</ul>
        </div>
    </div>
</div></div>

<script type="text/javascript" src="{{ asset('public/js/particles.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/particles-app.js') }}"></script>

<script type="text/javascript">
    $(function() {
        $('.item').first().addClass('active');
    });
</script>

@endsection