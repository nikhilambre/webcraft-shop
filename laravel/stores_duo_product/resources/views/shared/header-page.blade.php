<header class="c3-header">
    <nav class="navbar navbar-default navbar-fixed-top row">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand brand pull-left" href="#"><img src="{{ url('public/images/logo2.png') }}" class="brand-img-w" alt="logo"/><img src="{{ url('public/images/logo1.png') }}" class="brand-img-b" alt="logo"/></a>
            </div>

            <!-- Navbar list
            +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="collapse navbar-collapse header-page" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right text-center">
                    <li class="pri-li"><a href="{{ url('/') }}">Home</a></li>
                    <li class="pri-li"><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li class="pri-li"><a href="{{ url('/product') }}">Products</a></li>
                    <li class="pri-li hed-dropdown dropdown" style="position: static;">
                        <nav id="cbp-hrmenu" class="cbp-hrmenu">
                            <ul class="">
                                <li class="">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Categories <span class="caret"></span></a>
                                    <div class="cbp-hrsub row">
                                        <div class="cbp-hrsub-inner container animated pulse">
                                            @php
                                                $categoryListArray = $categoryList->toArray();
                                                $length = sizeof($categoryListArray);
                                                $loop = round($length/4);
                                                $count = 0;
                                            @endphp

                                            @for ($i = 1; $i <= 4; $i++)
                                            <div class="cbp-hrsub-inner-div">
                                                <div class="cbp-added">
                                                    @if ($i == 4)
                                                        @for ($j = ($loop*3); $j < $length; $j++, $count++)
                                                            <a href="{{ url('/category/'.$categoryListArray[$count]['categoryNameSlug']) }}" class="cbpc-link"><i class="fa fa-angle-double-right"></i> {{ $categoryListArray[$count]['categoryName'] }}</a>
                                                        @endfor
                                                    @else
                                                        @for ($j = 1; $j <= $loop; $j++, $count++)
                                                            <a href="{{ url('/category/'.$categoryListArray[$count]['categoryNameSlug']) }}" class="cbpc-link"><i class="fa fa-angle-double-right"></i> {{ $categoryListArray[$count]['categoryName'] }}</a>
                                                        @endfor
                                                    @endif
                                                </div>
                                            </div>
                                            @endfor

                                        </div><!-- /cbp-hrsub-inner -->
                                    </div><!-- /cbp-hrsub -->   
                                </li>
                            </ul>
                        </nav>
                    </li>
                    <li class="pri-li"><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                    <li class="pri-li-social"><a href="#" rel="link"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="pri-li-social"><a href="#" rel="link"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</header>