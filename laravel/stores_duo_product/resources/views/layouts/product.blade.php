<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
@include('shared.head')
@include('shared.style')
@include('shared.vendor-style')
@include('shared.fonts')
</head>

<body class="">
    <div id="preloader">
        <div id="status"></div>
    </div>

    <div class="notify-box" id="notify-box">
        <div class="notify-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
        <div class="notify-msg">
            <h4 class="">Message.!</h4>
            <p id="notify">something special done</p>
        </div>
    </div>

    @if(Session::has('message'))
    <div class="notify-box notify-show alert" id="notify-box">
        <div class="notify-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
        <div class="notify-msg">
            <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="">Message.!</h4>
            <p id="notify">{{ Session::get('message') }}</p>
        </div>
    </div>
    @endif

    @yield('html-content')

    @include('shared.footer')
    @include('shared.pageupdator')

    <!-- plugin's java Script 
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    @include('shared.vendor-scripts')

    <script type="text/javascript">

        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({'overflow':'visible'});
        });

        //  ajax save on click
        $(document).ready(function() {

        });
    </script>

    @include('shared.scripts')

    </body>
</html>