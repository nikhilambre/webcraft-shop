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
					<h1 class="head-text">Contact Us</h1>
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

<div class="cont-11-wrap">
    <div class="form-section"><div class="container">
        <div class="section-head text-center">
            <h2 class="head-text">Get In Touch</h2>
            <p class="p-text">Integer eget diam vitae ligula dapibus congue et non ex. Maecenas id ultricies mi, ac rhoncus felis. Proin vitae velit auctor, faucibus nibh non, posuere neque</p>
        </div>

        <div class="contact-form col-lg-10 col-lg-offset-1">
            <div class="text-section row">
                <div class="box col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center">
                    <h3 class="lead-text">Addresses</h3>
                    <p class="p-text">123, Building name, Location, City Name, State, Country 302012</p>
                </div>
                <div class="box col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center">
                    <h3 class="lead-text">Phone</h3>
                    <p class="p-text">+1 (123) 4567890</p>
                    <p class="p-text">+1 (123) 4567893</p>
                </div>
                <div class="box col-md-4 col-lg-4 col-sm-4 col-xs-12 text-center">
                    <h3 class="lead-text">Email</h3>
                    <p class="p-text">info@yourdomain.com</p>
                </div>        
            </div>

            <form>
                <div class="input-group col-md-6 col-xs-12">
                    <input type="text" class="form-control input-lg" placeholder="Name *">
                </div>

                <div class="input-group col-md-6 col-xs-12">
                    <input type="email" class="form-control input-lg" placeholder="Email *">
                </div>

                <div class="input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <textarea rows="4" class="form-control input-lg" placeholder="Message *"></textarea>
                </div>

                <div class="input-group col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">            
                    <input type="submit" class="btn btn-lg" value="Submit">
                </div>
            </form>
        </div>
    </div></div>

    <div class="iframe-section">
        <iframe class="" height="440" width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45279.15681344716!2d2.155006812332599!3d41.37629763776478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona%2C+Spain!5e0!3m2!1sen!2sin!4v1521219964785"></iframe>
    </div>

</div>
@endsection