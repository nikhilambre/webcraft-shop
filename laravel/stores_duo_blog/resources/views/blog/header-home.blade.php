<header class="he-22-header"><div class="head-2-cover">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container"><header class="he-22-inwrap">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="hed-first hidden-sm">
                    <ul class="list-unstyled list-inline">
                        <li class=""><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class=""><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class=""><a href="#"><i class="fa fa-google"></i></a></li>
                        <li class=""><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Navbar list
            +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                <div class="hed-first visible-sm">
                    <ul class="list-unstyled list-inline">
                        <li class=""><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class=""><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class=""><a href="#"><i class="fa fa-google"></i></a></li>
                        <li class=""><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="hed-last hidden-xs">
                    <ul class="list-inline list-unstyled">
                        <li class=""><a href="javascript:void(0)" id="show-search">Search</a></li>
                        @if(Auth::guard('customer')->check())
                        <li class=""><a href="{{ url('/cart') }}">Cart</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Hi {{ ucfirst(Auth::guard('customer')->user()->name) }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}">My Profile</a></li>
                                <li><a href="{{ url('/cart') }}">My Cart</a></li>
                                <li><a href="{{ url('/wishlist') }}">My Wishlist</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('customer.logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class=""><a href="{{ url('/customer/login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>
                <div class="hed-cent">
                    <ul class="nav navbar-nav ">
                        <li class="visible-xs">
                            <form class="search-form" action="/search" method="get">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search Here">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                        <li class=""><a href="{{ url('/') }}">Home</a></li>
                        <li class="">
                            <a href="javascript:void(0)" id="dLabel" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                @foreach ($category as $cat)
                                <li><a href="{{ url('/category/'.$cat->categoryNameSlug) }}">{{ $cat->categoryName }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class=""><a href="{{ url('/populer') }}">Populler</a></li>
                        <li class=""><a href="{{ url('/shop') }}">Shop</a></li>
                        <li class=""><a href="{{ url('/about') }}">About Me</a></li>
                    </ul>
                </div>
            </div>

        </div></div>
    </nav>
</header>

<div class="he-22-search" id="he-22-search">
    <div class="search-box col-xs-12 col-lg-6 col-lg-offset-3">
        <span class="search-close" id="search-close"><i class="fa fa-close"></i></span>
        <form class="search-form" action="{{ route('blog.searchResult') }}" method="get">
            <div class="form-group">
                <p class="">Search For : </p>
                <div class="slide-three">
                    <input type="radio" name="type" id="optionsRadios1" value="blog" checked class="id-slide-three" />
                    <label for="optionsRadios1">Blog</label>
                </div>
                <div class="slide-three">
                    <input type="radio" name="type" id="optionsRadios2" value="product" class="id-slide-three" />
                    <label for="optionsRadios2">Products</label>
                </div>
            </div>
            <div class="form-group">
                <input type="text"  name="keyword" class="form-control input-lg" placeholder="Search Here">
            </div>
            <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

