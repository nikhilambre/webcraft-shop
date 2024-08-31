<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Hi, Login to <span>StoresBuzz</span></h3>
        </div>
        <div class="modal-body login-modal">

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="login">
                <div class="tab1 row _p40">
                    <p class="sign-part">OR</p>

                    <div class="left row col-md-6 col-sm-6 col-xs-12 col-lg-6">
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

                    <div class="right col-md-6 col-sm-6 col-xs-12 col-lg-6">

                        <!-- require_once ('fblogin/src/Facebook/autoload.php');

                        $fb = new Facebook\Facebook([
                            'app_id' => '1208674315884831',
                            'app_secret' => '1259b7feb72fe9da6f6d81e694a54772',
                            'default_graph_version' => 'v2.2',
                            ]);

                        $helper = $fb->getRedirectLoginHelper();
                        $permissions = ['email']; // optional
                        $loginUrl = $helper->getLoginUrl('https://www.storesbuzz.com/fblogin/fbconfig.php', $permissions);
                         -->

                        <a href="<php echo $loginUrl;?>" class=""><i class="fa fa-facebook"></i>Continue with Facebook</a>
                        <a href="#" class=""><i class="fa fa-twitter"></i>Continue with Twitter</a>
                        <a href="#" class=""><i class="fa fa-google-plus"></i>Continue with Google</a>
                    </div>
                </div>
                <div class="row _p20">
                <h4 class="pull-left">New to StoresBuzz? <a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Sign Up Here</a></h4>
                <h4 class="pull-right"><a href="#forgotpass" aria-controls="forgotpass" role="tab" data-toggle="tab">Forgot password?</a></h4>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="signup">
                <div class="tab2 row _p40">
                    <p class="sign-part">OR</p>
                    <div class="left row col-md-6 col-sm-6 col-xs-12 col-lg-6">

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
                    <div class="right col-md-6 col-sm-6 col-xs-6 col-lg-6 p10 hidden-xs">
                        <a href="fblogin/fbconfig.php" class=""><i class="fa fa-facebook"></i>Continue with Facebook</a>
                        <a href="#" class=""><i class="fa fa-twitter"></i>Continue with Twitter</a>
                        <a href="#" class=""><i class="fa fa-google-plus"></i>Continue with Google</a>
                    </div>
                </div>
                <h4>Already have account? <a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login Here</a></h4>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="forgotpass">
                <div class="tab3 row _p40">
                    <h4>Enter Your Registered Email here to send Password Reset link to your Inbox.</h4>
                    <div class="reset-pass row">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.password.email') }}">
                        {{ csrf_field() }}

                        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email Id" required />
                                <i class="fa fa-envelope" aria-hidden="true"></i>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12 p0">
                                <button type="submit" class="btn btn-lg pull-right">Send Password Reset Link</button>
                            </div>
                        </div>

                    </form>

                    </div>
                </div>
                <h4>Already have account? <a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login Here</a></h4>
            </div>
        </div>

        </div>
    </div>
    </div>
</div>

