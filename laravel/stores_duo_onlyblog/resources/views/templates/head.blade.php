<meta charset="utf-8" />
<base href="http://localhost:8080/laravel/stores_duo_blog/">
<title>StoresBuzz - Sample | Build your own website | Website Creator | E commerce web store</title>

<meta name="description" content="StoresBuzz is best website builder for online shopping websites, Working to bring all small business online. Choose Designs, Build Store with our developer and sell online. We know 'How to make your own website?'">
<meta name="keywords" content="shopping cart, online store, ecommerce website, online store website, Free hosting, ecommerce platforms, buy online, storesbuzz, e commerce, website maker">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Author" content="StoresBuzz">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Favicon -->
<link rel="shortcut icon" href="public/images/lo2.png">

<!-- Bootstrap v3.3.6 & Custome stylesheet
+++++++++++++++++++++++++++++++++++++++++++++++++   -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}" type='text/css' media="screen" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/v4-shims.js"></script>

<link rel="stylesheet" href="{{ asset('public/css/structure.css') }}" type='text/css' />
<link rel="stylesheet" href="{{ asset('public/css/classes.css') }}" type='text/css' />
<link rel="stylesheet" href="{{ asset('public/css/animate.min.css') }}" type='text/css' />

<!-- Design for template page
+++++++++++++++++++++++++++++++++++++++++++++++++   -->
<link rel="stylesheet" href="{{ asset('public/css/mlpushmenu.css') }}" type='text/css' />

<script type="text/javascript" src="{{ asset('public/js/modernizr.mlpushmenu.js') }}"></script>

<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>