@extends('layouts.blog')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())Author Page @endif
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
<div class="container">

    @foreach ($blogauthor as $author)
    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 blog-main">
        <div class="post-22">
            <div class="post-author">
            </div>
            <hr>
            <div class="post-subtitle">
                <h4>{{ $author->authorDetails }}</h4>
            </div>
            <div class="post-content">
                {!! $author->authorDescription !!}
            </div>
        </div>
    </div>
    @endforeach

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 blog-side">
        @include('blog.blog-sidebar-post')
    </div>

</div>
@endsection