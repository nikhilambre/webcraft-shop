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
					<h1 class="head-text">About Us</h1>
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

<div class="sec-text"><div class="container">
    <h2 class="head-text">Who We Are</h2>
    <p class="p-text">Etiam maximus felis in metus sagittis, in auctor velit sollicitudin. Nullam vel augue mattis, semper nibh vitae, venenatis arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer a laoreet mi. Integer rhoncus nisl nec porta malesuada. Cras quam quam, ornare id bibendum nec, sollicitudin sed magna. Sed convallis tempus auctor. Vestibulum vitae fringilla mi. Suspendisse blandit egestas augue, at ultrices velit mollis sed. Vestibulum semper fringilla ante eget faucibus.</p>

    <h2 class="head-text">What Are Our Goals</h2>
    <p class="p-text">Etiam maximus felis in metus sagittis, in auctor velit sollicitudin. Nullam vel augue mattis, semper nibh vitae, venenatis arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer a laoreet mi. Integer rhoncus nisl nec porta malesuada. Cras quam quam, ornare id bibendum nec, sollicitudin sed magna. Sed convallis tempus auctor. Vestibulum vitae fringilla mi. Suspendisse blandit egestas augue, at ultrices velit mollis sed. Vestibulum semper fringilla ante eget faucibus.</p>
    <p class="p-text">Suspendisse potenti. Donec arcu neque, laoreet nec egestas at, lobortis at nisi. Sed tempus orci leo, quis cursus tellus vehicula vel. Duis ac tellus sed turpis consectetur rutrum pharetra eu velit. Ut luctus rutrum hendrerit. Phasellus in efficitur nisl. Nam dolor nisi, efficitur quis turpis sit amet, lobortis vulputate magna.</p>

    <h2 class="head-text">How We Work</h2>
    <p class="p-text">Etiam maximus felis in metus sagittis, in auctor velit sollicitudin. Nullam vel augue mattis, semper nibh vitae, venenatis arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer a laoreet mi. Integer rhoncus nisl nec porta malesuada. Cras quam quam, ornare id bibendum nec, sollicitudin sed magna. Sed convallis tempus auctor. Vestibulum vitae fringilla mi. Suspendisse blandit egestas augue, at ultrices velit mollis sed. Vestibulum semper fringilla ante eget faucibus.</p>

    <h2 class="head-text">Our Team</h2>

    <div class="b10-wrap">
        <div class="b10-box text-center col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <img class="img-thumbnail" alt="team member" src="public/images/teammemb1.jpg" />
            <h4 class="lead-text">Miss. Cherry<br><small>Lead Designer</small></h4>
            <p class="p-text">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
            <ul class="list-unstyled">
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-twitter"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-facebook"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>

        <div class="b10-box text-center col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <img class="img-thumbnail" alt="team member" src="public/images/teammemb3.jpg" />
            <h4 class="lead-text">Dan Jossef<br><small>Chief Executive Officer</small></h4>
            <p class="p-text">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
            <ul class="list-unstyled">
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-twitter"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-facebook"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-google-plus"></i></a></li>
            </ul>
        </div>

        <div class="b10-box text-center col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <img class="img-thumbnail" alt="team member" src="public/images/teammemb5.jpg" />
            <h4 class="lead-text">Mark Boucher<br><small>Marketing Expert</small></h4>
            <p class="p-text">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
            <ul class="list-unstyled">
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-twitter"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-facebook"></i></a></li>
                <li><a href="javascript:void(0)" class="sos-ico"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div></div>
@endsection