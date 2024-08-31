<footer class="footer">
    <div class="footer-back">
    </div>

    <div class="foot-link"><div class="container p80_">
        <div class="left col-md-5 col-xs-12">
            <h3><span>Worldwide </span>users connected with us</h3>
            <p class="p20_">Nam commodo leo ut venenatis ultrices. Fusce molestie mauris quis pulvinar interdum. In iaculis mattis dolor, molestie malesuada nisl ultricies sed.</p>
            <div class="share-buttons pull-left">

            </div>
        </div>
        <div class="right col-md-7 col-xs-12">
            <div class="col-md-4 col-xs-12">
                <h3>Links</h3>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    <li><a href="{{ url('/terms') }}">Terms &amp; Conditions</a></li>
                    <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('/refund') }}">Refund Policy</a></li>
                    <li><a href="{{ url('/pricing-detail') }}">Pricing Details</a></li>
                    <li><a href="{{ url('/cancel-order') }}">Order Cancellations</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-xs-12">
                <h3>Support</h3>
                <ul class="list-unstyled">
                    <li><a href="javascript:void(0)">How to choose Domains?</a></li>
                    <li><a href="javascript:void(0)">How StoresBuzz Helps to build site?</a></li>
                    <li><a href="javascript:void(0)">How To choose Components?</a></li>
                    <li><a href="javascript:void(0)">Who To Start?</a></li>
                    <li><a href="javascript:void(0)">How StoresBuzz helps?</a></li>
                    <li><a href="javascript:void(0)">What StoresBuzz provide?</a></li>
                </ul>                    
            </div>
            <div class="col-md-2 col-xs-12" style="padding-right: 0">
                <h3>Pages</h3>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/feature') }}">Features</a></li>
                    <li><a href="{{ url('/product') }}">Product</a></li>
                    <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                    <li><a href="{{ url('/blog') }}">Blogs</a></li>
                    <li><a href="{{ url('/template') }}">Templates</a></li>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('/ourwork') }}">Our Work</a></li>
                    <li><a href="{{ url('/our-services') }}">Our Services</a></li>
                    <li><a href="{{ url('/how-we-do-it') }}">How We Do It</a></li>
                </ul>
            </div>
        </div>

    </div></div>

    <div class="foot-note"><div class="container p40_ text-center">
        <p>&copy;2018 <a href="javascript:void(0)">{{ config('app.name') }}</a>. All rights reserved. </p>
        <p>Developed by <a href="javascript:void(0)">WebCraft Shop</a></p>
    </div></div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) and bootstrap js
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->

<script src="{{ asset('public/js/cbpHorizontalMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/dyscrollup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/jquery.easing.1.3.js') }}" type='text/javascript'></script>

<script>
    $(function() {
        cbpHorizontalMenu.init();
        dyscrollup.init();
        $('#inPage').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });
</script>