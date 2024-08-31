@extends('layouts.main')

@section('title')
Order Cancel - WebCraft Shop | Build your own website | Websites store India
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

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">Cancel Order</h2>
        <h3>WebCraft Shop values your money and status to provide you more than you need.</h3>
    </div>
</div></div>


<div class="nx-list"><div class="container">

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">
        <h3 class="h3-head">Cancellation of Order.</h3>
        <h4 class="h4-head">ORDER ID : {{ $orderCode }}</h4><br>

        <p>We would like to hear a reason for cancellation of order from you. We value each of our customer and it would be huge loss for us. We expect detail reason for your order cancellation. We still would like to assist you, Send us a call Request before cancellation.</p>
        <p>Read our Refund policies before you cancel order. Refund will be given as per status of order.
        <br><br>
        <a href="{{ url('/refund') }}">Check Refund Policy.</a></p>
        <br>
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <textarea type="textarea" rows="5" class="form-control" id="cancelText" placeholder="* Reason For Cancellation (800 words max)" maxlength="800"></textarea>
        </div>
        </div>

        <div class="nx-links">
            <a href="javascript:void(0)" class="nx-btn btn-lg" id="order-cancel">Cancel Order &amp; Ask For Refund</a>
            <a href="{{ url('/order/call') }}" class="nx-btn btn-lg" id="save-call">Schedule a Call</a>
        </div>

    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
    </div>
    
</div></div>


<script type="text/javascript">
    $(document).ready(function() {
    
        $("#order-cancel").click(function() {
            
            var token = $('meta[name="csrf-token"]').attr('content');
            var cancel = $('#cancelText').val();
            
            if (cancel) {
                $.ajax({
                    type : "POST",
                    url : "{{ url('/ajax/cancelorder/'.$orderId) }}",
                    data : { "_token" : token, "cancelText" : cancel},
                    success : function(d) {
                        $('#notify-box').animate("fast").animate({
                            opacity : "show"
                        }, "slow");

                        $('#notify').text(d);

                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }, 5000);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $('#notify-box').animate("fast").animate({
                            opacity : "show"
                        }, "slow");

                        $("#notify").text(errorThrown);

                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }, 5000);
                    }
                });
            } else{
                $('#notify-box').animate("fast").animate({
                    opacity : "show"
                }, "slow");

                $('#notify').text('Reason for Cancellation is Required.');

                setTimeout(function(){
                    $('#notify-box').animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }, 5000);
            }
        });
    
    
    });
</script>

@endsection