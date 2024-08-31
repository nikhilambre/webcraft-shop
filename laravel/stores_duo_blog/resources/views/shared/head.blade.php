<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Author" content="StoresBuzz">

<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">

<meta name="google-site-verification" content="1SGAiE0gJvDjCxrQT4dJc6hd-PVRCJkSkkWr0SI4J3c" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Favicon -->
<link rel="shortcut icon" href="public/images/lo2.png" />

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<meta property="fb:app_id" content="1208674315884831" />

<meta property="og:url" content="{{ config('app.url') }}" />
<meta property="og:type" content="websites" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:image" content="@yield('page-image')" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@StoresBuzz" />

<!-- Constant Styles -->
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/animate.min.css') }}" rel="stylesheet">

<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/v4-shims.js"></script>

<!-- Bootstrap v3.2.0 & Custome stylesheet   -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
<!-- <link href="public/stylesheet/css/bootstrap.min.css" rel="stylesheet" type='text/css' media="screen" /> -->


<!-- stylesheet  -->


<!-- Vendor stylesheet  -->


<!-- Google fonts  -->



<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>