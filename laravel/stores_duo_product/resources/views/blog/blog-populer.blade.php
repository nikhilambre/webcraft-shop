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
            <h2 class="b1-h2 head-text">Populer Posts</h2>
        </div>
    </div></div>
</div></div><!-- Page Header 11 ends Here -->


<div class="container">
    <div class="blog-main col-xs-12 col-sm-8 col-md-8 col-lg-8">

        <div class="infinite-scroll">
        @foreach ($postList as $post)
        <div class="sec-s52">
            <div class="post-tags">
                @foreach ($tags[$post->id] as $tag)
                <a href="{{ url('/tag/'.$tag->tagNameSlug) }}" class="p-text">{{ $tag->tagName }}, </a>
                @endforeach
            </div>
            <div class="post-title">
                <h3 class="head-text"><a href="{{ url('/post/'.$post->postTitleSlug) }}">{{ $post->postTitle }}</a></h3>
            </div>
            <div class="post-author">
                <a href="{{ url('/author/'.$post->authorNameSlug) }}">{{ $post->authorName }}</a> . <span class="p-text post-date">{{ date('d-M', strtotime($post->created_at)) }}</span>
            </div>
            <div class="post-img">
                <img class="img" src="{{ url('public/storage/blog/'.$post->postImgName) }}" alt="blog image">
            </div>
            <div class="post-short-desc">
                <p class="p-text">{{ $post->postSubTitle }}</p>
            </div>
        </div>
        @endforeach
        </div><!-- End of Infinite Scroll -->
        {{ $postList->links() }}
    </div>

    <div class="blog-side col-sm-4 col-md-4 col-lg-4 col-xs-12"><!-- XS view components will be present inbetween of main sec -->
        @include('blog.blog-sidebar-home')
    </div>
</div>

<script src="{{ asset('public/js/jquery.jscroll.min.js') }}"></script>


@endsection