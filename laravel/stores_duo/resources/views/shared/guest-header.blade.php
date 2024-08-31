<header class="hed1">
    <nav class="hed1-navbar navbar navbar-default navbar-static-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="hed1-navbar-header navbar-header navbar-left row">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hed1-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand brand pull-left" href="{{ url('/') }}" rel="author"><img src="{{ asset('public/images/logo-color.png') }}" class="brand-img-w" alt="Brand logo"><img src="{{ asset('public/images/logo-color1.png') }}" class="brand-img-b" alt="Brand logo"></a></h1>
            </div>

            <!-- Navbar list
            +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="hed1-navbar-collapse collapse navbar-collapse" id="hed1-navbar-collapse">
                <ul class="hed1-nav hed1-left nav navbar-nav">
                    <li><a href="{{ url('/feature') }}">Features</a></li>
                    <li><a href="{{ url('/product') }}">Products</a></li>
                    <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                    <li class="hed1-dropdown dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Demos <i class="caret"></i></a>
                        <ul class="dropdown-menu">
                            <li class=""><a href="{{ url('/coming-soon') }}"><i class="fa fa-angle-double-right"></i>Dashboard</a></li>
                            <li class=""><a href="{{ url('/coming-soon') }}"><i class="fa fa-angle-double-right"></i>Bloggers Website</a></li>
                            <li class=""><a href="{{ url('/coming-soon') }}"><i class="fa fa-angle-double-right"></i>Blog + Shop Website</a></li>
                            <li class=""><a href="{{ url('/coming-soon') }}"><i class="fa fa-angle-double-right"></i>Portfolio Website</a></li>
                            <li class=""><a href="{{ url('/coming-soon') }}"><i class="fa fa-angle-double-right"></i>Product Website</a></li>
                            <li class=""><a href="{{ url('/coming-soon') }}"><i class="fa fa-angle-double-right"></i>Static Website</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="hed1-nav hed1-right nav navbar-nav navbar-right text-center">
                    <li class="hed1-dropdown dropdown" style="position: static;">
                        <nav id="cbp-hrmenu" class="cbp-hrmenu">
                            <ul class="">
                                <li class="">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Templates <span class="caret"></span></a>
                                    <div class="cbp-hrsub row">
                                        <div class="cbp-hrsub-inner container animated pulse">

                                            <div class="cbp-hrsub-inner-div">
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template') }}"><i class="fa fa-tv"></i> Templates</a>
                                                    <p class="hrsub-p">We have multiple Design Templates with Multiple Categories, Go through their details.</p>
                                                </div>
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template-list/contact') }}"><i class="fa fa-chess-rook"></i> Contact Us Page Designs</a>
                                                    <p class="hrsub-p">Page which connects you with user, Multiple Designs to match your Expectations.</p>
                                                </div>
                                            </div>

                                            <div class="cbp-hrsub-inner-div">
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template-list/header') }}"><i class="fa fa-chess-king"></i> Landing Page Header Designs</a>
                                                    <p class="hrsub-p">Landing Page Header Defines your Website Design. It's First Component that your visitors will See. Find Suitable Header Here.</p>
                                                </div>
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template-list/footer') }}"><i class="fa fa-chess"></i> Page Footer Designs</a>
                                                    <p class="hrsub-p">Multiple Footer Design to Match different kind of Websites are available, Check Designs here.</p>
                                                </div>
                                            </div>

                                            <div class="cbp-hrsub-inner-div">
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template-list/pagehead') }}"><i class="fa fa-chess-knight"></i> Page Header Designs</a>
                                                    <p class="hrsub-p">We have multiple Design Templates with Multiple Categories, Go through their details.</p>
                                                </div>
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template-list/sidebar') }}"><i class="fa fa-chess-bishop"></i> Sidebar Sections Designs</a>
                                                    <p class="hrsub-p">Landing Page Header Defines your Website Design. It's First Component that your visitors will See. Find Suitable Header Here.</p>
                                                </div>
                                            </div>

                                            <div class="cbp-hrsub-inner-div">
                                                <div class="cbp-added">
                                                    <a class="hrsub-link" href="{{ url('/template-list/component-list') }}"><i class="fa fa-chess-queen"></i> Page Components</a>
                                                    <ul class="component-ul list-unstyled">
                                                        <li><a href="{{ url('/template-list/component-list/1') }}"><i class="fa fa-angle-double-right"></i> Page Componenets</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/2') }}"><i class="fa fa-angle-double-right"></i> Page Tag Lines</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/3') }}"><i class="fa fa-angle-double-right"></i> Carousals Componenets</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/4') }}"><i class="fa fa-angle-double-right"></i> Testimonial Componenets</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/5') }}"><i class="fa fa-angle-double-right"></i> Portfolio Componenets</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/6') }}"><i class="fa fa-angle-double-right"></i> Blog Page Componenets</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/7') }}"><i class="fa fa-angle-double-right"></i> Ecommerce Componenets</a></li>
                                                        <li><a href="{{ url('/template-list/component-list/9') }}"><i class="fa fa-angle-double-right"></i> Other Page Componenets</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- /cbp-hrsub-inner -->
                                    </div><!-- /cbp-hrsub -->   
                                </li>
                            </ul>
                        </nav>
                    </li>
                    <li class=""><a href="{{ url('/blog') }}">Blogs</a></li>
                    @if(Auth::guard('customer')->check())
                    <li class="hed1-dropdown dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{ ucfirst(Auth::guard('customer')->user()->name) }} <i class="caret"></i></a>
                        <ul class="dropdown-menu">
                            <li class=""><a href="{{ url('/order/user') }}"><i class="fa fa-user"></i>My Profile</a></li>
                            <li class=""><a href="{{ url('/order/user/components') }}"><i class="fa fa-images"></i>My Components</a></li>
                            <li class=""><a href="{{ url('/order/list') }}"><i class="fa fa-gift"></i>My Orders</a></li>
                            <li class=""><a href="{{ url('/order/create') }}"><i class="fa fa-thumbs-up"></i>Place Order</a></li>
                            <li class=""><a href="{{ url('/order/custom') }}"><i class="fa fa-thumbs-up"></i>Custom Order</a></li>
                            <li class=""><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i>Logout
                                </a>

                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="signup-modal"><a href="javascript:void(0)" rel="link" type="button" class="" data-toggle="modal" data-target="#signup-modal">Place Order</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
