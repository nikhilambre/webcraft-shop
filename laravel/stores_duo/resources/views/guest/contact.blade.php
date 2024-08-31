@extends('layouts.main')

@section('title')
Contact Us - WebCraft Shop | Build your own website | Websites store India
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
            <h2 class="home-h2">Contact Us</h2>
            <p class="home-p">We are experts at designing for all kinds of digital platforms, harnessing the power of digital media to engage people in unexpected ways and increase conversation about our clients' brand.</p>
            <div class="home-link hidden">
                <a href="{{ url('/pricing-detail') }}" class="">Pricing in Detail</a>
                <a href="{{ url('/template') }}" class="first">Designs</a>
            </div>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="ne-section-1"><div class="container p60_">
    <div class="col-left col-md-7 col-sm-7 col-xs-12 col-lg-7">
        <h3 class="">Send us a Text</h3>
        <form class="contact p10_" name="contactform" method="POST" action="{{ route('post.contact') }}">
            {{ csrf_field() }}

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control input-lg" name="messageName" maxlength="100" placeholder="Full Name *" required/>
                <i class="fa fa-user"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="email" class="form-control input-lg" name="messageEmail" maxlength="100" placeholder="Email ID *" required/>
                <i class="fa fa-envelope"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control input-lg" name="messageContact" maxlength="20" placeholder="With Country Code *" required onkeypress="return isNumberKey(event)" />
                <i class="fa fa-phone"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <textarea rows="5" class="form-control input-lg" name="messageText" maxlength="1600" placeholder="Your Message *" required></textarea>
                <i class="fa fa-edit"></i>
            </div><br>

            @captcha('en')

            <p id="msg_notify" class="row"></p>
            
            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">            
                <input type="submit" name="submit" class="btn btn-lg" id="send-message" value="Send">
            </div>
        </form>
    </div>
    <div class="col-right col-md-5 col-sm-5 col-xs-12 col-lg-5">
        <h3>Stay Connected</h3>
        <div class="box box-mail">
            <h4><i class="fa fa-envelope"></i><small>Mail us:</small><br> info@webcraftshop.com</h4>
        </div>

        <div class="box box-call">
            <h4><i class="fa fa-phone"></i><small>Call Us:</small><br> +91 8850 143 760</h4>
        </div>

        <div class="box box-call">
            <h4><i class="fa fa-globe-americas"></i><small>Address:</small>
                <address>
                    <strong>WebCraft Shop</strong><br>
                    Vihang Valley, GB Road<br>
                    Mumbai, MH, INDIA 400 615<br>
                    <abbr title="Phone">P:</abbr> (+91) 8850 143 760 
                </address>

                <address>
                    <strong>Sales Manager</strong><br>
                    <a href="mailto:#">sales@webcraftshop.com</a>
                </address>
            </h4>
        </div>

        <div class="box box-connect">
            <h4><small>Get in touch with </small><strong>Social network</strong></h4>
            <ul class="list-inline list-unstyled social">
                <li><a href="https://www.facebook.com/storesbuzz/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://plus.google.com/u/0/112459500928774490060"><i class="fab fa-google"></i></a></li>
                <li><a href="https://twitter.com/StoresBuzz"><i class="fab fa-twitter"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCadb3JNVADIjZH46OZzZyFA"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</div></div>


@endsection