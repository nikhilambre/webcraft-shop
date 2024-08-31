
<div class="na-head-top"><div class="container">
    <div class="pull-left hidden-xs">
        <ul class="list-inline list-unstyled">
            <li class=""><a href="https://www.facebook.com/storesbuzz/"><i class="fa fa-facebook"></i></a></li>
            <li class=""><a href="https://twitter.com/StoresBuzz"><i class="fa fa-twitter"></i></a></li>
            <li class=""><a href="https://www.youtube.com/channel/UCadb3JNVADIjZH46OZzZyFA"><i class="fa fa-youtube"></i></a></li>
            <li class=""><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
            <li class=""><a href="https://plus.google.com/u/0/112459500928774490060"><i class="fa fa-google"></i></a></li>
        </ul>
    </div>
    <div class="pull-right">
        <ul class="list-inline list-unstyled">
            <li><a><i class="fa fa-envelope-square"></i>info@storesbuzz.com</a></li>
            <li><a><i class="fa fa-phone-square"></i>+91 8850 143 760</a></li>
        </ul>
    </div>
</div></div>






{{-- Go to guest Head --}}
















<header class="na-header">
    <nav class="na-navbar navbar navbar-default navbar-static-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-left row">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand brand pull-left" href="{{ url('/') }}" rel="author"><img src="{{ asset('public/images/test1.png') }}" class="brand-img-w" alt="Brand logo"/><img src="public/images/test1.png" class="brand-img-b" alt="Brand logo"/></a>
            </div>

            <!-- Navbar list
            +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if(Auth::guard('customer')->check())
                <ul class="nav navbar-nav navbar-right text-center">
                    <li class="lev-1"><a href="{{ url('/feature') }}">FEATURES</a></li>
                    <li class="lev-1"><a href="{{ url('/template') }}">TEMPLATES</a></li>
                    <li class="lev-1"><a href="{{ url('/pricing') }}">PRICING</a></li>
                    <li class="lev-1"><a href="{{ url('/ourwork') }}">OUR WORK</a></li>
                    <li class="lev-1"><a href="{{ url('/contact') }}">CONTACT US</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{ Auth::guard('customer')->user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="/template"><i class="fa fa-tv"></i>Templates</a></li>
                            <li><a href="{{ url('/order/create') }}"><i class="fa fa-snowflake-o"></i>New Order</a></li>
                            <li><a href="{{ url('/order/list') }}"><i class="fa fa-gift"></i>My Orders</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>Logout
                                </a>

                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @else
                <ul class="nav navbar-nav navbar-right text-center ">
                    <li class="lev-1"><a href="{{ url('/feature') }}">FEATURES</a></li>
                    <li class="lev-1"><a href="{{ url('/template') }}">TEMPLATES</a></li>
                    <li class="lev-1"><a href="{{ url('/pricing') }}">PRICING</a></li>
                    <li class="lev-1"><a href="{{ url('/ourwork') }}">OUR WORK</a></li>
                    <li class="lev-1"><a href="{{ url('/contact') }}">CONTACT US</a></li>
                    <li class="signup-modal"><a href="javascript:void(0)" rel="link" type="button" class="" data-toggle="modal" data-target="#signup-modal">Log In</a></li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
</header>