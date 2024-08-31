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

@yield('og-facebook')
@yield('og-twitter')

<!-- Constant Styles -->
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/animate.min.css') }}" rel="stylesheet">

<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<!-- Bootstrap v3.3.6 & Custome stylesheet   -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->

<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
