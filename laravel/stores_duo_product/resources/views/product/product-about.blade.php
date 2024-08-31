@extends('layouts.product')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())
About Us | {{ $_ENV['APP_NAME'] }};
@endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())
About Us | {{ $_ENV['APP_NAME'] }};
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
                    <h1 class="head-text" data-section="1500">{!! $sc['1500'] !!}</h1>
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

<div class="sec-text"><div class="container">
    <h2 class="head-text" data-section="1501">{!! $sc['1501'] !!}</h2>
    <p class="p-text" data-section="1502">{!! $sc['1502'] !!}</p>

    <h2 class="head-text" data-section="1503">{!! $sc['1503'] !!}</h2>
    <p class="p-text" data-section="1504">{!! $sc['1504'] !!}</p>
    <p class="p-text" data-section="1505">{!! $sc['1505'] !!}</p>

    <h2 class="head-text" data-section="1506">{!! $sc['1506'] !!}</h2>
    <p class="p-text" data-section="1507">{!! $sc['1507'] !!}</p>

    <h2 class="head-text" data-section="1508">{!! $sc['1508'] !!}</h2>
    <p class="p-text" data-section="1509">{!! $sc['1509'] !!}</p>
    <p class="p-text" data-section="1510">{!! $sc['1510'] !!}</p>

    <h2 class="head-text" data-section="1511">{!! $sc['1511'] !!}</h2>
    <p class="p-text" data-section="1512">{!! $sc['1512'] !!}</p>
    <p class="p-text" data-section="1513">{!! $sc['1513'] !!}</p>

    <h2 class="head-text" data-section="1514">{!! $sc['1514'] !!}</h2>

    <div class="b10-wrap">
        <div class="b10-box text-center col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <img class="img-thumbnail" alt="team member" data-imgsection="1527" src="{{ url('public/storage/page/').'/'.$sc['1527'] }}" />
            <h4 class="lead-text" data-section="1515">Miss. Cherry<br><small>Marketing Expert</small></h4>
            <p class="p-text" data-section="1517">{!! $sc['1517'] !!}</p>
            <ul class="list-unstyled" data-section="1518">{!! $sc['1518'] !!}</ul>
        </div>

        <div class="b10-box text-center col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <img class="img-thumbnail" alt="team member" data-imgsection="1528" src="{{ url('public/storage/page/').'/'.$sc['1528'] }}" />
            <h4 class="lead-text" data-section="1519">Dan Jossef<br><small>Chief Executive Officer</small></h4>
            <p class="p-text" data-section="1521">{!! $sc['1521'] !!}</p>
            <ul class="list-unstyled" data-section="1522">{!! $sc['1522'] !!}</ul>
        </div>

        <div class="b10-box text-center col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <img class="img-thumbnail" alt="team member" data-imgsection="1529" src="{{ url('public/storage/page/').'/'.$sc['1529'] }}" />
            <h4 class="lead-text" data-section="1523">Mark Boucher<br><small>Lead Designer</small></h4>
            <p class="p-text" data-section="1525">{!! $sc['1525'] !!}</p>
            <ul class="list-unstyled" data-section="1526">{!! $sc['1526'] !!}</ul>
        </div>
    </div>
</div></div>

@endsection