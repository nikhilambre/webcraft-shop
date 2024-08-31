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


<div class="ne-home"><div class="container">
    <div class="home-box text-center">
        <h2 class="home-h2">Contact <span>StoresBuzz</span></h2>
        <h3>We are experts at designing for all kinds of digital platforms, harnessing the power of digital media to engage people in unexpected ways and increase conversation about our clients' brand.</h3>
    </div>
</div></div>

<div class="ne-section-1"><div class="container p60_">
    <div class="col-left col-md-7 col-sm-7 col-xs-12 col-lg-7">
        <h3 class="p10_">Send us a Text</h3>
        <form class="contact p10_" name="contactform" method="POST" action="contact.php">
            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control input-lg" name="msg_name" id="msg_name" maxlength="100" placeholder="Full Name *" required/>
                <i class="fa fa-user"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="email" class="form-control input-lg" name="msg_email" id="msg_email" maxlength="100" placeholder="Email ID *" required/>
                <i class="fa fa-envelope-o"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control input-lg" name="msg_cont" id="msg_cont" maxlength="20" placeholder="With Country Code *" required onkeypress="return isNumberKey(event)" />
                <i class="fa fa-phone"></i>
            </div><br>

            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <textarea rows="5" class="form-control input-lg" name="msg_value" id="msg_value" maxlength="4000" placeholder="Your Message *" required></textarea>
                <i class="fa fa-pencil-square-o"></i>
            </div><br>

            <?php
                error_reporting(E_ALL & ~E_NOTICE);

                if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] && isset($_POST['submit'])){
                    
                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $privatekey = '6LcUYBAUAAAAAFSxdt3MUfaGZZyA2TtgIJrllxrx';
                    $captcha = $_POST['g-recaptcha-response'];
                    $ip = $_SERVER['REMOTE_ADDR'];
                    
                    $rsp = file_get_contents("$url?secret=$privatekey&response=$captcha&remoteip=$ip");
                    
                    $data = json_decode($rsp);

                    
                    if(isset($data->success) AND $data->success==true){

                        require_once('connection.php');
                        $conn = Connect();

                        $name = $conn->real_escape_string($_POST['msg_name']);
                        $email= $conn->real_escape_string($_POST['msg_email']);
                        $cont = $conn->real_escape_string($_POST['msg_cont']);
                        $val  = $conn->real_escape_string($_POST['msg_value']);


                        $query   = "INSERT into messages (msg_name, msg_email, msg_contact, msg_text, msg_flag) 
                                                    VALUES ('" . $name . "',
                                                            '" . $email . "',
                                                            '" . $cont . "',
                                                            '" . $val . "',
                                                            'unread')";

                        $success = $conn->query($query);

                        $conn->close();

                        if (!$success) {
                            die("<p class='p10_'>Couldn't Send Message, Try Later.</p>");
                        }

                        if ($success) {
                            echo "<p class='p10_'>Thank You For Contacting StoresBuzz.</p>";
                        }

                    } else{

                        echo "<p class='p10_'>reCaptcha verification failed. Try again.</p>";
                    }
                }

            ?>

            <div class="g-recaptcha" data-sitekey="6LcUYBAUAAAAAIGxjGcKR1Hk6MkaB7mTK9SUh-ji"></div>

            <p id="msg_notify" class="row"></p>
            
            <div class="row input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">            
                <input type="submit" name="submit" class="btn btn-lg" id="send-message" value="Send">
            </div>
            
        </form>
    </div>
    <div class="col-right col-md-5 col-sm-5 col-xs-12 col-lg-5">
        <h3>Stay Connected</h3>
        <div class="box box-mail">
            <h4><i class="fa fa-envelope"></i><small>Mail us:</small><br> info@storesbuzz.com</h4>
        </div>

        <div class="box box-call">
            <h4><i class="fa fa-mobile-phone fa-2x"></i><small>Call Us:</small><br> +91 8850 143 760</h4>
        </div>

        <div class="box box-call">
            <h4><i class="fa fa-globe"></i><small>Address:</small>
                <address>
                    <strong>StoresBuzz</strong><br>
                    Vihang Valley, GB Road<br>
                    Mumbai, MH, INDIA 400615<br>
                    <abbr title="Phone">P:</abbr> (+91) 8850 143 760 
                </address>

                <address>
                    <strong>Sales Manager</strong><br>
                    <a href="mailto:#">sales@storesbuzz.com</a>
                </address>
            </h4>
        </div>

        <div class="box box-connect">
            <h4><small>Get in touch with </small><strong>Social network</strong></h4>
            <ul class="list-inline list-unstyled social">
                <li><a href="https://www.facebook.com/storesbuzz/"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://plus.google.com/u/0/112459500928774490060"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="https://twitter.com/StoresBuzz"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCadb3JNVADIjZH46OZzZyFA"><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</div></div>


@endsection