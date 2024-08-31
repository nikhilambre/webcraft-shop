<header class="hed1">
    <nav class="hed1-navbar navbar navbar-default navbar-static-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="hed1-navbar-header navbar-header navbar-left row">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand brand pull-left" href="{{ url('/') }}" rel="author">Web<span>Shop</span><!--img src="" class="brand-img-w" alt="Brand logo"><img src="" class="brand-img-b" alt="Brand logo"--></a></h1>
            </div>

            <!-- Navbar list
            +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="hed1-navbar-collapse collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="hed1-left nav navbar-nav">
                    <li><a href="{{ url('/feature') }}">Features</a></li>
                    <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                    <li><a href="{{ url('/template') }}">Templates</a></li>
                </ul>

                <!-- ob_start(); -->
                @if(Auth::guard('customer')->check())
                <ul class="hed1-right nav navbar-nav navbar-right text-center">
                    <li class=""><a href="{{ url('/ourwork') }}">Our Work</a></li>
                    <li class=""><a href="{{ url('/contact') }}">Contact Us</a></li>
                    <li class="hed1-dropdown dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{ Auth::guard('customer')->user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li class=""><a href="/template"><i class="fa fa-tv"></i>Templates</a></li>
                            <li class=""><a href="{{ url('/order/create') }}"><i class="fa fa-snowflake-o"></i>New Order</a></li>
                            <li class=""><a href="{{ url('/order/list') }}"><i class="fa fa-gift"></i>My Orders</a></li>
                            <li class=""><a href="{{ route('logout') }}"
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
                    <li class=""><a href="{{ url('/ourwork') }}">Our Work</a></li>
                    <li class=""><a href="{{ url('/contact') }}">Contact Us</a></li>
                    <li class="signup-modal"><a href="javascript:void(0)" rel="link" type="button" class="" data-toggle="modal" data-target="#signup-modal">Login</a></li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
