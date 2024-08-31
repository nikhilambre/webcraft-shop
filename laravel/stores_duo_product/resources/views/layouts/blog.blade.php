<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
@include('shared.head')           <!-- Yield fb and twitter graphs -->
@include('shared.style')          <!-- Import template specific stylesheet- A file-->
@include('shared.vendor-style')   <!-- -->
@include('shared.fonts')          <!-- Fonts required for template -->
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
    @yield('html-content')

    @include('shared.footer')

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