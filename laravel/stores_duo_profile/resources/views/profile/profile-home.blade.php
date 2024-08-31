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

<div id="carousel-example-generic" class="he-16-carousel carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="col-md-7">
                <div class="carousel-caption">
                    <h2 class="" data-animation="animated bounceInLeft">Rank Your Site At Top From Other!</h2>
                    <p class="" data-animation="animated bounceInLeft">Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus. Fusce ultricies quam id augue. Phasellus tincidunt tortor eget nibh varius tincidunt.</p>
                    <a data-animation="animated bounceInLeft" href="javascript:void(0)">Check Demo</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="img-box">
                <img data-animation="animated zoomInUp" class="img" src="public/images/slide1.png" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="col-md-6">
                <div class="carousel-caption">
                    <h2 data-animation="animated bounceInLeft" class="">Boost Your Brand with Us</h2>
                    <p data-animation="animated bounceInLeft" class="">Quod qui esse dicta ut quo provident iste exercitationem sapiente debitis dolor. Maecenas id ultricies mi, ac rhoncus felis. Proin vitae velit auctor</p>
                    <a data-animation="animated bounceInLeft" href="javascript:void(0)">Know More</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                <img data-animation="animated zoomInUp" class="img" src="public/images/slide2.png" alt="">
                </div>
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
</div>

<div class="sec-s77 row">
    <div class="container">
        <h2 class="head-text sec-h2 text-center">Create Your Own Experience</h2>
        <p class="lead-text sec-p text-center">Ut lacus ante, commodo ultrices ornare ac, aliquet at urna. Integer in ipsum diam facilisis enim quis vulputate</p>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="box">
                    <i class="far fa-calendar-alt"></i>
                    <h3 class="lead-text">Etiam mollis sem tortor, sit amet</h3>
                    <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quisque congue augue rutrum neque iaculis porta.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="box">
                    <i class="far fa-check-square"></i>
                    <h3 class="lead-text">Aliquam ultrices volutpat eleifend</h3>
                    <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quisque congue augue rutrum neque iaculis porta.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="box">
                    <i class="far fa-clock"></i>
                    <h3 class="lead-text">Ut sed maximus massa, ut malesuada</h3>
                    <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quisque congue augue rutrum neque iaculis porta.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="box">
                    <i class="far fa-envelope"></i>
                    <h3 class="lead-text">Sed facilisis enim quis vulputate</h3>
                    <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quisque congue augue rutrum neque iaculis porta.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sec-s78 row">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="box1">
                    <img src="public/images/bg27.jpg" class="img-thumbnail">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="box2">
                    <h2 class="head-text">Aliquam ultrices volutpat <br>eleifend content</h2>
                    <p class="lead-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quisque congue augue rutrum neque iaculis porta.</p>
                    <a class="btn btn-lg btn-default" href="javascript:void(0)">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sec-s78 row">
    <div class="container">
        <div class="row">
            <div class="box3-wrap col-xs-12 col-md-4">
                <div class="box3">
                    <h2 class="head-text">Aliquam ultrices volutpat <br>eleifend content</h2>
                    <p class="lead-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quisque congue augue rutrum neque iaculis porta.</p>
                    <a class="btn btn-lg btn-default" href="javascript:void(0)">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="box1-wrap col-xs-12 col-md-8">
                <div class="box1">
                    <img src="public/images/bg30.jpeg" class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="b3-wrap"><div class="container text-center">
    <h2 class="head-text">WebCraft</h2>
    <p class="p-text">Etiam mattis condimentum diam vel tincidunt. Sed sit amet vehicula turpis. Praesent faucibus mollis dapibus. Mauris feugiat, ipsum sit amet suscipit congue, enim erat aliquet eros</p>
    <a href="javascript:void(0)" class="btn btn-primary btn-lg">Conect With Us Now..!</a>
</div></div>
@endsection