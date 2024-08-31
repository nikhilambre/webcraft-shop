@extends('layouts.main')

@section('title')
Pricing - WebCraft Shop | Build your own website | Websites store India
@endsection

@section('description')
WebCraft Shop is website builder tool for all kind of websites, Working to bring small business online. Cheaper & Quality Websites with Laravel & Angular Frameworks
@endsection

@section('keywords')
best website builder, online store, Blog, ecommerce website, ecomerce, online store website, Free hosting, ecommerce platforms, buy online, webcraft Shop, e commerce, website maker
@endsection

@section('page-image')
https://www.webcraftshop.com/public/images/logo.png
@endsection


@section('content')
<div class="nb-home">
    <div class="nb-back"></div>
    <div class="container">
        <div class="home-box">
            <h2 class="home-h2">Pricing</h2>
            <p class="home-p">We are working to add quality features to WebCraft Shop which in turn will simplify your work and can bring more leads to you.</p>
            <div class="home-link">
                <a href="{{ url('/pricing-detail') }}" class="">Pricing in Detail</a>
                <a href="{{ url('/template') }}" class="first">Designs</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="nc-sec-1">
    <div class="container">
        <div class="nc1-text col-xs-12 col-sm-6 col-lg-6 col-md-6">
            <h2 class="nc1-h2">An Investment that makes you globally visible and Let you stand ahead</h2>
            <h4 class="nc1-h4">Most important which matters for buyer is cost But at WebCraft Shop we brought you quality material at Cheapest price possible.</h4>
            <h4 class="nc1-h4">Our Websites are running over premium hosting, Most widely used Laravel Framework and Angular 4 supportive dashboard. We suggest you don't need to go for poor quality just to manage cost. WebCraft Shop is now a great alternative.</h4>
        </div>
        <div class="nc1-img col-xs-12 col-sm-6 col-lg-6 col-md-6 hidden-xs">
            <img src="{{ asset('public/images/f1.jpg') }}" class="img-responsive" />
        </div>
    </div>
</div>

<div class="nc-sec-3">
    <div class="container">
        <h2 class="nc3-h2 text-center">What all valued Items are be added in Website Cost You Paid<br><small>We value your Money</small></h2>
        <div class="nc3-text">

            <div class="col-xs-12 col-md-4">
                <div class="box row">
                    <div class="col-md-3 col-sm-4 col-xs-3 col-lg-3">
                        <span class="ico-cover">
                            <i class="fa fa-graduation-cap"></i>
                        </span>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-9 col-lg-9">
                        <h4 class="lead-text black">Premium Web Hosting storage with Email IDs for domains</h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="box row">
                    <div class="col-md-3 col-sm-4 col-xs-3 col-lg-3">
                        <span class="ico-cover">
                            <i class="fa fa-mobile-alt"></i>
                        </span>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-9 col-lg-9">
                        <h4 class="lead-text black">Mobile Ready, Responsive Design for all Device Sizes</h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="box row">
                    <div class="col-md-3 col-sm-4 col-xs-3 col-lg-3">
                        <span class="ico-cover">
                            <i class="fa fa-globe"></i>
                        </span>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-9 col-lg-9">
                        <h4 class="lead-text black">SEO friendly + Validated HTML Code + Google analytics</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="box row">
                    <div class="col-md-3 col-sm-4 col-xs-3 col-lg-3">
                        <span class="ico-cover">
                            <i class="fa fa-lightbulb"></i>
                        </span>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-9 col-lg-9">
                        <h4 class="lead-text black">On Page CMS for Easy Update + Chat Feature</h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="box row">
                    <div class="col-md-3 col-sm-4 col-xs-3 col-lg-3">
                        <span class="ico-cover">
                            <i class="fa fa-server"></i>
                        </span>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-9 col-lg-9">
                        <h4 class="lead-text black">Well Designed Databases for Products & Blogs upload</h4>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="box row">
                    <div class="col-md-3 col-sm-4 col-xs-3 col-lg-3">
                        <span class="ico-cover">
                            <i class="fa fa-file-code"></i>
                        </span>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-9 col-lg-9">
                        <h4 class="lead-text black">MVC Pattern based Laravel website + Angular Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nc-sec-4"><div class="container">
    <h2 class="nc4-h2 text-center">Pricing Plans<br><small>We value your money</small></h2>

    <div class="price-wrap owl-carousel owl-theme hidden-xs">
        <div class="item">
            <h2 class="item-head text-center">Static Website Plans</h2>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Static Lite</h3>
                        <p class="expl">No Database site of any purpose, With Contact info Display</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost3600'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>No Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Default Pages + 2 Custom Pages</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>One Time Content Update</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/static-website') }}">See Details</a></li>
                    </ul>
                    
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>

            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Static Plus</h3>
                        <p class="expl">Static Lite features with Added Custom Pages</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost5000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>No Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Default Pages + 6 Custom Pages</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>One Time Content Update</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/static-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="item">
            <h2 class="item-head text-center">Product Website Plans</h2>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Product Lite</h3>
                        <p class="expl">Product Showcase & Enquiry Feature upto 6 Products</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost6000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Product Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Product Quotes/Enquiry Feature</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Reviews</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Product Plus</h3>
                        <p class="expl">Product Showcase & Enquiry for upto 50 Products</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost8000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Product Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Product Quotes/Enquiry Feature</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Reviews</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Product + Shop</h3>
                        <p class="expl">Product Plus Features With Online Shop & Orders management</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost12000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Product Dashboard + Shop</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Integrated Payment Gateway for Online Shop</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Reviews + Coupons</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="item">
            <h2 class="item-head text-center">Portfolio Website Plans</h2>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Portfolio Lite</h3>
                        <p class="expl">Personal/Corporate Profile with Connect Features</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost6000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Portfolio Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Defailt Pages + 6 Custom Pages</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Connect Features</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/profile-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Portfolio Plus</h3>
                        <p class="expl">Portfolio Plus features with Added Custom Pages</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost9000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Portfolio Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Defailt Pages + 12 Custom Pages</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Connect Features</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/profile-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Portfolio + Blog</h3>
                        <p class="expl">Portfolio Plus Features With Blogs Post Support</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost12000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Portfolio Shop Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Blogs Features upto 200 Blogs Post</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Social Cennect & Comment</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/profile-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="item">
            <h2 class="item-head text-center">Bloggers Website Plans</h2>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Bloggers Lite</h3>
                        <p class="expl">Bloggers Website with support upto 200 Blogs Post</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost6000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Blog Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Tags + Connect</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/blog-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Bloggers Plus</h3>
                        <p class="expl">Bloggers Website with support upto 1000 Blogs Post</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost9000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Blog Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Tags + Connect</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/blog-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Bloggers + Shop</h3>
                        <p class="expl">Bloggers Plus Features With Online Shop & Orders management</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost12000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Blog Shop Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Tags + Connect + Online Selling</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/blog-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="item">
            <h2 class="item-head text-center">Custom Website Plans</h2>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Ecommerce <br>Website</h3>
                        <p class="expl">Ecommerce Online Shop website with Order management</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost10000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Shop Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Default + Shop Pages</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Product Reviews, Coupons & Multi option support</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/ecommerce-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Portfolio + Blog + Shop</h3>
                        <p class="expl">Products & Blogs With E-Commerce Online Shop</p>
                        <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost18000'] }}<span>/ Month</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Integrated Dashboard</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Default + 6 Custom profile Pages</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Portfolio with upto 400 Blogs & 100 Products</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                    </ul>
                    @if (Auth::guard('customer')->check())
                    <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                    @else
                    <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="price">
                    <div class="text-center">
                        <h3 class="head">Custom <br>Websites</h3>
                        <p class="expl">Any other Web sites & Software Developement Plans & Ideas</p>
                        <h3 class="value">Contact Us<span>Depends on work</span></h3>
                    </div>
                    <ul class="price-ul list-unstyled">
                        <li class=""><i class="fa fa-angle-double-right"></i>Build, Upgrade or Maintenance Work</li>
                        <li class=""><i class="fa fa-angle-double-right"></i>Any Ideas with New Custom Designs</li>
                        <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/contact') }}">Send Details</a></li>
                    </ul>
                    <a href="{{ url('/order/custom') }}" class="btn btn-default btn-block btn-lg">Custom Order</a>
                </div>
            </div>
        </div>
    </div>
    <div class="price-wrap owl-carousel owl-theme visible-xs">

        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Static Lite</h3>
                    <p class="expl">No Database site of any purpose, With Contact info Display</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost3600'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>No Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Default Pages + 2 Custom Pages</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>One Time Content Update</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/static-website') }}">See Details</a></li>
                </ul>
                
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Static Plus</h3>
                    <p class="expl">Static Lite features with Added Custom Pages</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost5000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>No Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Default Pages + 6 Custom Pages</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>One Time Content Update</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/static-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>

        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Product Lite</h3>
                    <p class="expl">Product Showcase & Enquiry Feature upto 6 Products</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost6000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Product Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Product Quotes/Enquiry Feature</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Reviews</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Product Plus</h3>
                    <p class="expl">Product Showcase & Enquiry for upto 50 Products</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost8000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Product Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Product Quotes/Enquiry Feature</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Reviews</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Product + Shop</h3>
                    <p class="expl">Product Plus Features With Online Shop & Orders management</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost12000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Product Dashboard + Shop</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Integrated Payment Gateway for Online Shop</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Reviews + Coupons</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>

        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Portfolio Lite</h3>
                    <p class="expl">Personal/Corporate Profile with Connect Features</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost6000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Portfolio Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Defailt Pages + 6 Custom Pages</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Connect Features</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/profile-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Portfolio Plus</h3>
                    <p class="expl">Portfolio Plus features with Added Custom Pages</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost9000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Portfolio Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Defailt Pages + 12 Custom Pages</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Connect Features</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/profile-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Portfolio + Blog</h3>
                    <p class="expl">Portfolio Plus Features With Blogs Post Support</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost12000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Portfolio Shop Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Blogs Features upto 200 Blogs Post</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Social Cennect & Comment</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/profile-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>

        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Bloggers Lite</h3>
                    <p class="expl">Bloggers Website with support upto 200 Blogs Post</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost6000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Blog Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Tags + Connect</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/blog-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Bloggers Plus</h3>
                    <p class="expl">Bloggers Website with support upto 1000 Blogs Post</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost9000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Blog Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Tags + Connect</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/blog-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Bloggers + Shop</h3>
                    <p class="expl">Bloggers Plus Features With Online Shop & Orders management</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost12000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Blog Shop Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>OnPage Update + Filters + Tags + Connect + Online Selling</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/blog-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>

        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Ecommerce <br>Website</h3>
                    <p class="expl">Ecommerce Online Shop website with Order management</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost10000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Shop Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Default + Shop Pages</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Product Reviews, Coupons & Multi option support</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/ecommerce-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Portfolio + Blog + Shop</h3>
                    <p class="expl">Products & Blogs With E-Commerce Online Shop</p>
                    <h3 class="value"><i class="fas fa-{{ $pageData['currencyIcon'] }}"></i>{{ $pageData['cost18000'] }}<span>/ Month</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Integrated Dashboard</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Default + 6 Custom profile Pages</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Portfolio with upto 400 Blogs & 100 Products</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/product/product-website') }}">See Details</a></li>
                </ul>
                @if (Auth::guard('customer')->check())
                <a href="{{ url('/order/create/'.$pageData['pageCurrency']) }}">Place Order</a>
                @else
                <a href="javascript:void(0)" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#signup-modal">Place Order</a>
                @endif
            </div>
        </div>
        <div class="item">
            <div class="price">
                <div class="text-center">
                    <h3 class="head">Custom <br>Websites</h3>
                    <p class="expl">Any other Web sites & Software Developement Plans & Ideas</p>
                    <h3 class="value">Contact Us<span>Depends on work</span></h3>
                </div>
                <ul class="price-ul list-unstyled">
                    <li class=""><i class="fa fa-angle-double-right"></i>Build, Upgrade or Maintenance Work</li>
                    <li class=""><i class="fa fa-angle-double-right"></i>Any Ideas with New Custom Designs</li>
                    <li class=""><i class="fa fa-angle-double-right"></i><a href="{{ url('/contact') }}">Send Details</a></li>
                </ul>
                <a href="{{ url('/order/custom') }}" class="btn btn-default btn-block btn-lg">Custom Order</a>
            </div>
        </div>

    </div>
    <br><br>
    <p class="price-foot">Default Pages include - Home, About Us, Contact Us, Terms & Privacy & 400 Not Found </p>
    <p class="price-foot">All Shared Prices include Hosting, Email & Initial Data Upload Fees</p>
</div></div>

<div class="nc-sec-5"><div class="container">
    <h2 class="nc5-h2">Custom Website Ideas are always welcome at WebCraft to Discuss</h2>
    <p class="nc5-p">We Develop &amp; Design all Kind of Websites as per Clients Own Thoughts as well. Functionality as You Willing to build. These Websites Will Be Build From Scratch as per Your Need. Designs Will Be also Build Specifically For Your Website. Once Build We will handover Source Code to You.</p>
    <p class="nc5-p">We Can Also Re-Build Your Website With New Designs and With Laravel Platform for Better Functionality. All Functionality You have in Existing site can Be Built in better way with Us.</p>
    <a href="{{ url('/order/custom') }}" class="nc5-link" >Go For Custom Websites</a>
</div></div>

<div class="nc-sec-2"><div class="container text-center">
    <h3 class="nc2-h3">At WebCraft Websites are Available for <span>Cheapest possible Prize</span><br>With No worries of Product Quality</h3>
    <p class="nc2-p">We are working to make all Process transparent with our clients.</p>
    <p class="nc2-p">We also let you View your Website Completion status at Each step, We Share a link to you where you can see under construction Site View. You can send Suggestions and Comments for our Designers after taking a look. You can also Schedule a call with our team for clearing your ideas with us.</p>
    <a href="{{ url('/product') }}" class="nc2-link">Check with Demos !!</a>
    <a href="{{ url('/pricing-detail') }}" class="nc2-link second">Pricing Details !!</a>
</div></div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        var owl = $('.owl-carousel');
        owl.owlCarousel({
          items:1,
          loop: true,
          margin: 10,
          autoPlay: true,
          slideTransition: 'linear',
          dots: false,
          autoplayTimeout: 5000,
          autoplaySpeed: 100,
          nav: true,
          navText: ["<img src='myprevimage.png'>","<img src='mynextimage.png'>"],
          navClass: ['owl-prev', 'owl-next'],
          responsiveClass:true,
          responsive : {
            0 : {
                items:1,
            },
            767 : {
                items:1,
            },
            991 : {
                items:1,
            }
        }
        });
    });
</script>
<script src="{{ asset('public/js/owl.carousel.min.js') }}" type="text/javascript"></script>
@endsection