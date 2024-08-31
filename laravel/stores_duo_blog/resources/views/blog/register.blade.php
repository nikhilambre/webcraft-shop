@extends('layouts.blog')

@section('title')
Register Page
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
                    <h2 class="head-text">Sign Up to My Blog</h2>
                </div>
                <p class="sign-part">OR</p>

                <div class="login row col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.register.submit') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" placeholder="First Name" required autofocus>
                                    <i class="fa fa-user-circle-o"></i>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <input id="lastname" type="text" class="form-control input-lg" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name" required>
                                    <i class="fa fa-user-circle-o"></i>
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                    <i class="fa fa-envelope"></i>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm Password" required>
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                        </div>

                        <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12 p0">
                            <button type="submit" class="btn btn-lg pull-right">Create profile</button>
                        </div>
                    </form>
                </div>

                <div class="social col-md-6 col-sm-6 col-xs-6 col-lg-6 p10 hidden-xs">
                    <a href="{{ url('/login/facebook') }}" class=""><i class="fa fa-facebook"></i>Continue with Facebook</a>
                    <a href="{{ url('/login/twitter') }}" class=""><i class="fa fa-twitter"></i>Continue with Twitter</a>
                    <a href="{{ url('/login/google') }}" class=""><i class="fa fa-google-plus"></i>Continue with Google</a>
                </div>
            </div>



        </div>
    </div>
</div>

@endsection