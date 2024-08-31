@extends('layouts.blog')

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
@include('blog.header-home')


<div class="cont-wrap-2">

<div class="cont-2"><div class="container">
    <div class="cont2-head text-center">
        <h2 class="head-text">Contact Us</h2>
        <p class="p-text">Please tell us about your next project and we will let you know what we can do to help you.</p>
    </div>
    <div class="form-errors">
        <p class="">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif
        </p>
    </div>
    <div class="contact-form col-lg-8 col-lg-offset-2">
        <form role="form" id="contact-form" method="POST" action="{{ route('blog.contact.post') }}">
            {{ csrf_field() }}

            <div class="input-group label-float-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <label class="label-text">Name</label>
                <input type="text" name="messageName" class="form-control input-lg" placeholder="Name">
            </div>

            <div class="input-group label-float-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <label class="label-text">Email address</label>
                <input type="email" name="messageEmail" class="form-control input-lg" placeholder="Email address">
            </div>

            <div class="input-group label-float-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <label class="label-text">Phone Number</label>
                <input type="text" name="messageContact" class="form-control input-lg" placeholder="Phone Number">
            </div>

            <div class="input-group label-float-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <label class="label-text">Enter message</label>
                <textarea rows="5" name="messageText" class="form-control input-lg" placeholder="Enter message"></textarea>
            </div>

            @captcha('en')

            <div class="input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">       
                <br><br>     
                <input type="submit" class="btn btn-lg btn-block" value="Submit">
            </div>

        </form>
    </div>
</div></div>

</div><!-- Contact 2 Ends Here -->


<div class="b43-wrap"><div class="container text-center">
    <div class="site-head">
        <h2 class="head-text">Keep In Touch<br>
        <small>We would love to know from you</small></h2>
        <span class="head-line"></span>
    </div>

    <div class="social-link">
        <ul class="ul-list-1 list-inline list-unstyled">
            <li class=""><a href="javascript:void(0)"><i class="fa fa-facebook"></i><br>facebook</a></li>
            <li class=""><a href="javascript:void(0)"><i class="fa fa-twitter"></i><br>twitter</a></li>
            <li class=""><a href="javascript:void(0)"><i class="fa fa-google"></i><br>google</a></li>
            <li class=""><a href="javascript:void(0)"><i class="fa fa-instagram"></i><br>instagram</a></li>
            <li class=""><a href="javascript:void(0)"><i class="fa fa-pinterest"></i><br>pinterest</a></li>
            <li class=""><a href="javascript:void(0)"><i class="fa fa-youtube"></i><br>youtube</a></li>
        </ul>
    </div>
</div></div>


<script type="text/javascript">

    $(document).ready(function() {

        // Activates floating label headings for the contact form
        $(".contact-form").on("input propertychange", ".label-float-group", function(e) {
            $(this).toggleClass("floating-label-update", !!$(e.target).val());
        }).on("focus", ".label-float-group", function() {
            $(this).addClass("floating-label-change");
        }).on("blur", ".label-float-group", function() {
            $(this).removeClass("floating-label-change");
        });
    
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {



    });
</script>

@endsection

