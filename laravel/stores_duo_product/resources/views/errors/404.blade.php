@extends('layouts.product')

@section('title')
@foreach ($seo as $s)
@if ($s->title)
{{ $s->title }} @else Home @endif
@endforeach
@endsection


@section('description')
@foreach ($seo as $s)
@if ($s->description)
{{ $s->description }} @else Website description @endif
@endforeach
@endsection


@section('keywords')
@foreach ($seo as $s)
@if ($s->keyword)
{{ $s->keyword }} @else website keywords @endif
@endforeach
@endsection


@section('page-image')
@foreach ($seo as $s)
@if ($s->ogImgName)
{{ asset('public/images/'.$s->ogImgName) }}
@else
{{ asset('public/images/logo.jpg') }}
@endif
@endforeach
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
                        <h1 class="head-text">Page Not Found</h1>
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


    <h2 class="p100">Page Not Found</h2>

@endsection