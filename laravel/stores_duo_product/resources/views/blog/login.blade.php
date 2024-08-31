@extends('layouts.blog')

@section('title')
Login Page
@endsection

@section('description')
Website description
@endsection

@section('keywords')
website keywords
@endsection

@section('page-image')
{{ asset('public/images/logo.jpg') }}
@endsection


@section('html-content')
@include('blog.header-home')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="sec-s56">
                <div class="s56-head text-center">
                    <h2 class="head-text">Sign In to My Blog</h2>
                </div>
                <p class="sign-part">OR</p>

                <div class="login col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email Id" required autofocus>
                                <i class="fa fa-user"></i>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                                <i class="fa fa-key"></i>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12 p0">
                            <button type="submit" class="btn btn-lg pull-right">Login</button>
                        </div>
                    </form>
                </div>

                <div class="social col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <a href="{{ url('/login/facebook') }}" class=""><i class="fa fa-facebook"></i>Continue with Facebook</a>
                    <a href="{{ url('/login/twitter') }}" class=""><i class="fa fa-twitter"></i>Continue with Twitter</a>
                    <a href="{{ url('/login/google') }}" class=""><i class="fa fa-google-plus"></i>Continue with Google</a>
                </div>
            </div>

            <div class="login-footer row">
                <p class="pull-right">Not a member? <a href="{{ url('/customer/register') }}">Sign Up Here. | <a href="{{ url('/customer/password/reset') }}">Forgot Password?</a></p>
            </div>

        </div>
    </div>
</div>

@endsection