@extends('layouts.user')

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

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">Your Order Saved</h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-list"><div class="container">

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">
        <h3 class="h3-head">Your Order is Saved..!</h3><br>
        <h4 class="h4-head">ORDER ID : {{ $orderCode }}</h4><br>

        <p>You can now Proceed to Pay or Send a Discussion Call request with our Team. After you send request for a Discussion call we will contact you on your Email or Skype Id shared. We will start working on order once payment done. You can view your order in My orders section and you can update Your Personal details.</p>
        <p>Once you Confirm Order and paid for it, You will have Comments section on Order Status page to share anything that comes to your mind. You can view Site status anytime and leave comments there.</p><br>
        <p><a href="{{ url('/help/orders') }}" class="">How my Order will be Delivered?</a></P>
        <p id="call-msg" class="p10_"></p>
        
        @foreach ($orders as $order)
        <div class="nx-links">
            <a href="javascript:void(0)" class="nx-btn btn-lg" id="order-call">Call Request</a>
            @if ($order->productCode != 'CUSTOM')
            <a href="{{ url('/order/payment/'.$order->id) }}" class="nx-btn btn-lg">Proceed to Pay</a>
            @endif
            <a href="{{ url('/order/delete/'.$order->id) }}" class="nx-btn btn-lg">Delete Order</a>
        </div>
        @php
            $orderId = $order->id;
        @endphp
        @endforeach
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
    </div>

</div></div>


<script type="text/javascript">
    $(document).ready(function() {
    
        $("#order-call").click(function() {
            
            var token = $('meta[name="csrf-token"]').attr('content');
            var order = '<?php echo $orderCode; ?>';
            
            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/call/'.$orderId) }}",
                data : { "_token": token, "orderCode": order },
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
        });
    
    
    });
</script>

@endsection