<!DOCTYPE html>

<html lang="en">
<head>
@include('templates.iframe-head')

@yield('customStyle')
@yield('vendoreStyle')
@yield('fonts')

<style>
    ::-webkit-scrollbar-corner{background:transparent;display:none}
    ::-webkit-scrollbar{width:1px;height:8px}
    ::-webkit-scrollbar-track{background:#fff;border-radius:30px}
    ::-webkit-scrollbar-thumb{border-radius:30px;background: #333;-webkit-box-shadow:none;border: 1px solid #fff;}
</style>

</head>

<body class="">

    @yield('htmlContent')

    @include('templates.iframe-foot')


    <!-- plugin's java Script 
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    @yield('vendoreScripts')


    @yield('scripts')

    </body>
</html>