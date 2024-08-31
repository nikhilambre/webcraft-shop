<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('shared.guest-head')
</head>

<body>
    <div class="notify-box alert" id="notify-box">
        <div class="notify-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
        <div class="notify-msg">
            <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

    <div class="na-head-wrap">
        @include('shared.guest-header')
    </div>

    @yield('content')

    @include('shared.footer')
    @include('shared.login-modal')
    @yield('scripts')
</body>

</html>
