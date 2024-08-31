@extends('layouts.product')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())
Contact Us | {{ $_ENV['APP_NAME'] }};
@endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())
Contact Us | {{ $_ENV['APP_NAME'] }};
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
                    <h1 class="head-text" data-section="2007">{!! $sc['2007'] !!}</h1>
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

<div class="cont-11-wrap">
    <div class="form-section"><div class="container">
        <div class="section-head text-center">
            <h2 class="head-text" data-section="2000">{!! $sc['2000'] !!}</h2>
            <p class="p-text" data-section="2001">{!! $sc['2001'] !!}</p>
        </div>

        <div class="contact-form col-lg-10 col-lg-offset-1">
            @foreach ($addressData as $addr)
            <div class="text-section row">
                <div class="box col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center">
                    <h3 class="lead-text" data-section="2002">{!! $sc['2002'] !!}</h3>
                    <p class="p-text">{{ $addr->addressHead }} {{ $addr->addressBody }}</p>
                </div>
                <div class="box col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center">
                    <h3 class="lead-text" data-section="2003">{!! $sc['2003'] !!}</h3>
                    <p class="p-text">{{ $addr->addressNumber }}</p>
                    <p class="p-text">{{ $addr->addressLine1 }}</p>
                    <p class="p-text">{{ $addr->addressLine2 }}</p>
                    <p class="p-text">{{ $addr->addressLine3 }}</p>
                    <p class="p-text">{{ $addr->addressLine4 }}</p>
                </div>
                <div class="box col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center">
                    <h3 class="lead-text" data-section="2004">{!! $sc['2004'] !!}</h3>
                    <p class="p-text">{{ $addr->addressName }} {{ $addr->addressEmail }}</p>
                </div>        
            </div>
            @endforeach

            <form name="contactform" method="POST" action="{{ route('post.contact') }}">
                {{ csrf_field() }}

                <div class="input-group col-md-6 col-xs-12">
                    <input type="text" class="form-control input-lg" name="messageName" maxlength="100" placeholder="Name *">
                </div>

                <div class="input-group col-md-6 col-xs-12">
                    <input type="email" class="form-control input-lg" name="messageEmail" maxlength="100" placeholder="Email *">
                </div>

                <div class="input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <textarea rows="4" class="form-control input-lg" name="messageText" maxlength="1600" placeholder="Message *"></textarea>
                </div>

                @captcha('en')
                <p id="msg_notify" class="row"></p>

                <div class="input-group col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">            
                    <input type="submit" class="btn btn-lg" value="Submit">
                </div>
            </form>
        </div>
    </div></div>

    <div class="sec-s88" style="background-image:url('public/images/3.jpg')">
        <div class="sec-s88-wrap text-center">
            <div class="container">
                <i class="fa fa-gift hidden"></i>
                <h2 class="head-text" data-section="2005">{!! $sc['2005'] !!}</h2>
                <p class="p-text" data-section="2006">{!! $sc['2006'] !!}</p>
                <a href="#" class="tag-link">Download Our Broucher</a>
                <a href="{{ url('/about-us') }}" class="tag-link">About Us</a>
            </div>
        </div>
    </div>

    <div class="iframe-section">
        @foreach ($iframeData as $iframe)
        <iframe class="" height="440" width="100%" src="{{ $iframe->iframeLink }}"></iframe>
        @endforeach
    </div>
</div>

@endsection