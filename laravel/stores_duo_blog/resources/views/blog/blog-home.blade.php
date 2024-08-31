@extends('layouts.blog')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())Home Page @endif
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

<div class="he-22-mid">
    <div class="container">
        <div class="he-22-head text-center">
            <h1><small>It's My Blog</small><br>Jasmine Gjelaj</h1>
        </div>
    </div>
</div>

<div id="carousel-example-generic" class="he-22-carousel carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <span class="inner-overlay"></span>
        <div class="item active">
            <div class="img imag1"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <div class="img imag2"></div>
            <div class="carousel-caption">

            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- Carosal Ends Here -->

<div class="sec-s31"><div class="container"><!-- Full 3 sections for blog home page -->
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            @foreach ($author as $aut)
            <div class="s31-b s31-b2">
                <div class="b2-text col-md-8">
                    <h3 class="lead-text b2-h3"><small>About Me</small><br>Hi to everyone..<br>My name is {{ $aut->authorName }}!</h3>
                    <p class="p-text b2-p">{{ $aut->authorDetails }}</p>
                    <a class="b2-a" href="{{ url('/author/'.$aut->authorNameSlug) }}">Read More</a>
                </div>
                <div class="b2-img col-md-4">
                    <img src="public/images/s3.jpg" alt="">
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="s31-b s31-b3 text-center">
                <h3 class="head-text b3-h3">Inspiration</h3>
                <p class="p-text b3-p">Coming from two different cultures has been instrumental in how we’ve approached our design process.</p>
                <a class="b3-a" href="{{ url('/inspirations') }}">Read More</a>
            </div>
        </div>
    </div>
</div></div><!-- End of s31 here -->

<div class="container">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

        <h2 class="section-head row">Populer Posts</h2>

        <div class="sec-s33 row"><!-- 2 Blocks with image for blog -->
            @foreach ($populerBlog as $pop)
            <div class="s33-bs col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
                <div class="bs-img">
                    <img class="img" src="{{ url('public/storage/blog/'.$pop->postImgName) }}" alt="blog image">
                </div>
                <h3 class="head-text bs-h3"><small>{{ $pop->categoryName }}<br></small>
                    <a href="{{ url('/post/'.$pop->postTitleSlug) }}">{{ $pop->postTitle }}</a>
                </h3>
                <span class="bs-date">{{ date('d-M', strtotime($pop->created_at)) }}</span>
            </div>
            @endforeach
        </div><!-- End of s33 here -->

        @foreach ($category as $catg)
        <div class="sec-s35 row"><!-- 3 Blocks with image for blog -->
            <h2 class="section-head row">{{ $catg->categoryName }}</h2><br>

            @foreach ($categoryBlog[$catg->id] as $catlist)
            <div class="s35-bs col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="padding-left: 0;">
                <div class="bs-img">
                    <img class="img" src="{{ url('public/storage/blog/'.$catlist->postImgName) }}" alt="blog image">
                </div>
                <h3 class="bs-h3">
                    <a href="{{ url('/post/'.$catlist->postTitleSlug) }}">{{ $catlist->postTitle }}</a>
                </h3>
                <span class="bs-date">{{ date('d-M', strtotime($catlist->created_at)) }}</span>
            </div>
            @endforeach
        </div><!-- End of s35 here -->
        @endforeach
    </div>

    <div class="hedden-xs col-sm-3 col-md-3 col-lg-3"><!-- XS view components will be present inbetween of main sec -->
        @include('blog.blog-sidebar-home')
    </div>

</div>
@endsection