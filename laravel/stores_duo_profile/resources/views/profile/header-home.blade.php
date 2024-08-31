<div class="he-16-top"><div class="container">
    <div class="navbar-topline row">
        <div class="pull-left top-left">
            <ul class="list-inline list-unstyled">
                <li class=""><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class=""><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class=""><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li class=""><a href="#"><i class="fab fa-google"></i></a></li>
                <li class=""><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="pull-right top-right">
            <ul class="list-inline list-unstyled">
                <li class="left-li"><i class="fa fa-envelope"></i>support@example.com</li>
                <li class="left-li"><i class="fa fa-phone"></i>+01 1800 123 456</li>
            </ul>
        </div>
    </div>
</div></div>

<header class="he-16-nav">
    <div class="container">
        <nav class="navbar navbar-default navbar-static-top row">
            <div class="container">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand brand pull-left" href="{{ url('/') }}">
                        <img src="public/images/logo-black.png" class="brand-img-b" alt="logo"/>
                    </a>
                </div>

                <!-- Navbar list
                +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right text-center">
                        <li class=""><a href="{{ url('/') }}">Home</a></li>
                        <li class=""><a href="{{ url('/about') }}">About Us</a></li>
                        <li class="hed16-dropdown dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Our Services <i class="caret"></i></a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="{{ url('/email-marketing') }}"><i class="fa fa-angle-double-right"></i>Email Marketing</a></li>
                                <li class=""><a href="{{ url('/offline-seo') }}"><i class="fa fa-angle-double-right"></i>Offline Seo</a></li>
                                <li class=""><a href="{{ url('/lead-generation') }}"><i class="fa fa-angle-double-right"></i>Lead Generation</a></li>
                                <li class=""><a href="{{ url('/social-media-marketing') }}"><i class="fa fa-angle-double-right"></i>Social Media Marketing</a></li>
                                <li class=""><a href="{{ url('/search-engine-optimization') }}"><i class="fa fa-angle-double-right"></i>Search Engine Optimization</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="{{ url('/contact') }}">Contact Us</a></li>
                        <li class="li-btn"><a href="javascript:void(0)">Schedule Call</a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>