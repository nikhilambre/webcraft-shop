<footer class="fot-s6"><!-- 2 sectioned footer -->
    <div class="foot-top row"><div class="container">
        <div class="s6-b1 col-lg-9">
            <div class="b1-c1">
                <ul class="c1-ul list-inline">
                    <li class="c1-li"><a href="{{ url('/') }}" class="c1-a">Home</a></li>
                    <li class="c1-li"><a href="{{ url('/about-us') }}" class="c1-a">About Us</a></li>
                    <li class="c1-li"><a href="{{ url('/product') }}" class="c1-a">Products</a></li>
                    <li class="c1-li"><a href="{{ url('/contact-us') }}" class="c1-a">Contact</a></li>
                    <li class="c1-li"><a href="{{ url('/terms') }}" class="c1-a">Terms</a></li>
                </ul>
            </div>
            <div class="b1-c2">
                <address>
                    @foreach ($addressData as $addr)
                    <i class="fa fa-home"></i><p class="c2-p">{{ $addr->addressBody }}</p>
                    <i class="fa fa-phone"></i><p class="c2-p">{{ $addr->addressNumber }}</p><br>
                    <i class="fa fa-envelope"></i><p class="c2-p">{{ $addr->addressName }} | {{ $addr->addressEmail }}</p>
                    @endforeach
                </address>
            </div>
        </div>
        <div class="s6-b2 col-lg-3">
            <p class="b2-p">STAY CONNECTED</p>
            <ul class="b2-ul list-inline">
                @foreach ($socialData as $social)
                <li class="b2-li"><a href="{{ $social->socialLink }}"><i class="fab fa-{{ $social->socialName }}"></i></a></li>    
                @endforeach
            </ul>
        </div>
    </div></div>
    <div class="foot-line row"><div class="container">
        <div class="s6-b5 pull-left">
            <p class="fl-p"><a href="#">WebCraft Shop</a> &copy; 2018</p> | 
            <p class="fl-p"><a class="fl-a" href="{{ url('/terms') }}">Terms</a></p> | 
            <p class="fl-p"><a class="fl-a" href="{{ url('/privacy') }}">Privacy Policy</a></p>
        </div>
        <div class="s6-b5 pull-right">
            <p class="fl-p">Designed & Developed By <a href="//www.webcraftshop.com" target="_blank"><strong>WebCraft Shop</strong></a></p>
        </div>
    </div></div>
</footer><!-- Footer 6 Ends Here -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) and bootstrap js
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->

<script src="{{ asset('public/js/cbpHorizontalMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/dyscrollup.min.js') }}" type="text/javascript"></script>

<script>
        $(function() {
            cbpHorizontalMenu.init();
        });
        dyscrollup.init();
    </script>