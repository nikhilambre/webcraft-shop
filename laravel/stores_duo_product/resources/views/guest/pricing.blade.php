@extends('layouts.main')

@section('title')
StoresBuzz | Build your own website | Ecommerce web store India
@endsection

@section('description')
StoresBuzz is best website builder for online shopping websites, Working to bring all small business online. We know 'How to make your own website?'')
@endsection

@section('keywords')
best website builder, online store, ecommerce website, ecomerce, online store website, Free hosting, ecommerce platforms, buy online, storesbuzz, e commerce, website maker
@endsection

@section('page-image')
https://www.storesbuzz.com/public/images/logo.png
@endsection



@section('content')


<div class="nc-home"><div class="container">
    <div class="home-box text-center">
        <h2 class="home-h2">We have a offer for you..!! Product Buzz package cost only for <span></span> and your site will be hosted in 4 Days. </h2>
    </div>
</div></div>

<div class="nc-section-1">

    <div class="sec-1 p80_"><div class="sec-1-wrap"><div class="container">
        <div class="col-left col-md-6 col-sm-6 col-lg-6 col-xs-12">
            <h2><span>StoresBuzz</span> gives you a complete working website in this cost</h2>
            <h3>Sign Up and choose from templates as your website requirements. Choose domain name available. Send us your Front End Content, logo, Font and images choices and it's done.</h3>
            <h3>No hidden costs and <strong>10 Days Refund</strong> Available if product Doesn't match your Expectations as per refund policy.</h3>
        </div>
        <div class="col-right col-md-6 col-sm-6 col-lg-6 col-xs-12">
            <h3>All Plans Includes</h3>
            <ul class="sec-ul list-unstyled">
                <li><i class="fa fa-gift"></i>Premium Hosting</li>
                <li><i class="fa fa-gift"></i>1 GB Database + 5 GB storage</li>
                <li><i class="fa fa-gift"></i>Easy Dashboard panel</li>
                <li><i class="fa fa-gift"></i>Chat Feature by <a href="https://www.tawk.to/" target="_blank">tawk.to</a></li>
                <li><i class="fa fa-gift"></i>200 Products upload</li>
                <li><i class="fa fa-gift"></i>100's of Designs to Choose on your own</li>
                <li><i class="fa fa-gift"></i>Content Edit for Easy Site Update</li>
                <li><i class="fa fa-gift"></i>Google Analytics</li>
                <li><i class="fa fa-gift"></i>SEO friendly + Validated HTML Code</li>
                <li><i class="fa fa-gift"></i>Mobile ready Website Designs &amp; much more...</li>
            </ul>
        </div>
    </div></div></div>


    <div class="sec-4 p40_"><div class="sec-1-wrap"><div class="container">
        <h2 class="text-center">Pricing Plans</h2>
        <h4 class="text-center">No Hidden costs and 10 Days Refund Available if product Doesn't match your Expectations.</h4>

        <div class="pricing pricing--tashi row">
            <div class="col-md-1 col-sm-1 col-lg-1">&nbsp;</div>

            <div class="pricing__item col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <h3 class="pricing__title">Product Buzz</h3>
                <p class="pricing__sentence">Perfect for those who want a site to Showcase there Products and accept calls &amp; enquiries from visitors</p>
                <div class="pricing__price"><span class="pricing__currency"><i class="fa fa-{{ $currencyIcon }}"></i></span>{{ $costBuzz }}<span class="pricing__period">/ year</span></div>
                <ul class="pricing__feature-list">
                    <li class="pricing__feature">1 GB of Storage + 5 Email Accounts</li>
                    <li class="pricing__feature">Add own Domain</li>
                    <li class="pricing__feature">Dashboard Panel</li>
                    <li class="pricing__feature">Multiple Filters + Tags</li>
                    <li class="pricing__feature">Enquiry Module</li>
                    <li class="pricing__feature">Email Support + Scheduled call for first 7days</li>
                    <li class="pricing__feature"><i class="fa fa-{{ $currencyIcon }}"></i>{{ $costBuzz/2 }} /year on Renew</li>
                    <li class="pricing__feature"><a href="feature-detail.php">See Details</a></li><br><br>
                </ul>

                @if (Auth::guest())
                    <a href="javascript:void(0)" rel="link" data-toggle="modal" data-target="#signup-modal" class="pricing__action btn btn-lg">Purchase this plan</a>
                @else
                    <a href="order.php?plan=buzz" class="pricing__action btn btn-lg" >Purchase this plan</a>
                @endif
            </div>

            <div class="col-md-2 col-sm-2 col-lg-2">&nbsp;</div>

            <div class="pricing__item col-md-4 col-sm-4 col-lg-4 col-xs-12">
                <h3 class="pricing__title">Product Store</h3>
                <p class="pricing__sentence">Suitable for those who want to sell &amp; accept online orders. Cart, Payment gateways &amp; order managment Included.</p>
                <div class="pricing__price"><span class="pricing__currency"><i class="fa fa-{{ $currencyIcon }}"></i></span>{{ $costStore }}<span class="pricing__period">/ year</span></div>
                
                <ul class="pricing__feature-list">
                    <li class="pricing__feature">5 GB of storage + 5 Email Accounts</li>
                    <li class="pricing__feature">Add own Domain</li>
                    <li class="pricing__feature">Dashboard Panel</li>
                    <li class="pricing__feature">Multiple Filters + Tags</li>
                    <li class="pricing__feature">User Signup and Profile</li>
                    <li class="pricing__feature">Shpping Cart + Order managment</li>
                    <li class="pricing__feature">Payment Gateway Integration</li>
                    <li class="pricing__feature">Email + Call Support for first 7days</li>
                    <li class="pricing__feature"><i class="fa fa-{{ $currencyIcon }}"></i>{{ $costStore/2 }} /year on Renew</li>
                    <li class="pricing__feature"><a href="feature-detail.php">See Details</a></li>
                </ul>
                
                @if (Auth::guest())
                    <a href="javascript:void(0)" rel="link" data-toggle="modal" data-target="#signup-modal" class="pricing__action btn btn-lg">Purchase this plan</a>
                @else
                     <a href="order.php?plan=store" class="pricing__action btn btn-lg" >Purchase this plan</a>
                @endif
            </div>

        </div><br><br>
        <h4>If you Have a Bigger plans, You are always welcome. Send us a message at Contact Us or Email us.</h4>
        <p>* We have no Hidden/Extra costs for accepting online orders &amp; we do not charge on your orders</p>
        <p>* A Service Tax Of 15% is added on The Prices Mentioned Above, As Per Government Regulations</p>

    </div></div></div>

    <div class="sec-3 p80_"><div class="sec-3-wrap"><div class="container">
        <h2>Trace your Order at Every step</h2>
        <h3>We have Complete Order tracing feature where you can check stauts of Product over 4 Days Delivery Period. You can add Suggestions and Comments for our Deigners after taking a look at your Under Construction webSite.</h3>
        <h3>You can also Schedule a call with our team for clearing your ideas with us.</h3>

        @if (Auth::guest())
            <a href="javascript:void(0)" rel="link" data-toggle="modal" data-target="#signup-modal" class="sec3-link">Place Your Order Now</a>
        @else
            <a href="order.php" class="sec3-link" >Place Your Order Now</a>
        @endif
    </div></div></div>
</div>

@endsection