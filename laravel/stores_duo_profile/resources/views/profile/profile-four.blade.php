@extends('layouts.profile')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())Blog Post Page @endif
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
@include('profile.header-home')
<section class="phe-s1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="inner-banner-content">
					<h1 class="head-text">Social Media Marketing</h1>
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
	<div class="banner-image" style="background-image:url('public/images/bg30.jpeg')"></div>
</section>

<div class="b39-wrap"><div class="container">
    <div class="col-md-6 col-xs-12">
        <div class="box-left text-center">
            <img class="b39-img" src="public/images/slide3.png" alt="category most viewed">
        </div>
    </div>

    <div class="col-md-6 col-xs-12">
        <div class="box-right">
            <h3 class="head-text">Suspendisse elementum vehicula elit, id ultrices velit</h3>
            <h4 class="lead-text">Duis ac tellus sed turpis consectetur rutrum</h4>
            <p class="p-text">Nulla ullamcorper ligula augue, eget euismod urna semper nec. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc pulvinar lobortis velit at vestibulum.</p>
            <a class="read-link" href="javascript:void(0)" class="">Read More</a>
        </div>
    </div>
</div></div>

<div class="sec-s81">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="head-text">Services We Provide</h2>
            <p class="p-text">Vestibulum vitae fringilla mi. Suspendisse blandit egestas augue, at ultrices velit mollis sed.</p>
        </div>
        <div class="box-wrap col-md-4 col-xs-12">
            <div class="box">
                <i class="box-icon far fa-address-book"></i>
                <h3 class="head-text">Maecenas id ultricies mi</h3>
                <p class="p-text">Pellentesque quis porta nibh. Fusce ultricies quam id augue suscipit convallis. Phasellus tincidunt tortor eget</p>
                <a href="javascript:void(0)"><i class="fa fa-caret-right"></i> Read More</a>
            </div>
        </div>
        <div class="box-wrap col-md-4 col-xs-12">
            <div class="box">
                <i class="box-icon fa fa-cocktail"></i>
                <h3 class="head-text">Cras nunc sem, interdum non</h3>
                <p class="p-text">Pellentesque quis porta nibh. Fusce ultricies quam id augue suscipit convallis. Phasellus tincidunt tortor eget</p>
                <a href="javascript:void(0)"><i class="fa fa-caret-right"></i> Read More</a>
            </div>
        </div>
        <div class="box-wrap col-md-4 col-xs-12">
            <div class="box">
                <i class="box-icon fa fa-code"></i>
                <h3 class="head-text">Donec ligula laoreet</h3>
                <p class="p-text">Pellentesque quis porta nibh. Fusce ultricies quam id augue suscipit convallis. Phasellus tincidunt tortor eget</p>
                <a href="javascript:void(0)"><i class="fa fa-caret-right"></i> Read More</a>
            </div>
        </div>
    </div>
</div>

<div class="b39-wrap"><div class="container">
    <div class="col-md-6 col-xs-12">
        <div class="box-left text-center">
            <img class="b39-img" src="public/images/slide2.png" alt="category most viewed">
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box-right">
            <h3 class="head-text">Suspendisse elementum vehicula elit, id ultrices velit</h3>
            <p class="p-text">Nulla ullamcorper ligula augue, eget euismod urna semper nec. Class aptent taciti sociosqu ad litora.</p>
            <ul class="ul-list list-unstyled">
                <li class=""><i class="fa fa-caret-right"></i> Suspendisse potenti donec arcu neque</li>
                <li class=""><i class="fa fa-caret-right"></i> Nunc mollis ex id viverra iaculise</li>
                <li class=""><i class="fa fa-caret-right"></i> Maecenas at tellus quis ex congue</li>
                <li class=""><i class="fa fa-caret-right"></i> Donec in urna rhoncus, luctus</li>
                <li class=""><i class="fa fa-caret-right"></i> Vestibulum semper fringilla ante</li>
            </ul>
        </div>
    </div>
</div></div>

<div class="b39-wrap"><div class="container">
    <div class="col-md-6 col-xs-12">
        <div class="box-right">
            <h3 class="head-text">Suspendisse elementum vehicula elit, id ultrices velit</h3>
            <h4 class="lead-text">Duis ac tellus sed turpis consectetur rutrum</h4>
            <p class="p-text">Nulla ullamcorper ligula augue, eget euismod urna semper nec. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc pulvinar lobortis velit at vestibulum.</p>
            <a class="read-link" href="javascript:void(0)" class="">Read More</a>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box-left text-center">
            <img class="b39-img" src="public/images/slide1.png" alt="category most viewed">
        </div>
    </div>
</div></div>
@endsection