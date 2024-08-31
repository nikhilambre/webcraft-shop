<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
<head>
    @include('shared.head')
</head>

<body>
    <div class="notify-box" id="notify-box">
        <div class="notify-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
        <div class="notify-msg">
            <h4 class="">Message.!</h4>
            <p id="notify">something special done</p>
        </div>
    </div>

    <div class="na-head-wrap">
        @include('shared.header')
    </div>

    @yield('content')
    @include('shared.footer')
    <script src="https://js.stripe.com/v3/"></script>
    @yield('scripts')
</body>

</html>