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
        <h2 class="home-h2">Delete Order</h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>



<div class="nx-list"><div class="container">

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">
        <h3 class="h3-head">Sure you want to Delete order..?</h3><br>
        <h4 class="h4-head">ORDER ID : {{ $orderCode }}</h4><br>

        <p>We would like to hear a reason for Deletion of Order. We value each of our customer and it would be huge loss for us. 
        We would like to assist you, Send us a call Request before Deletion.</p>
        <p>Once order is Deleted your components selected will be lost. If you are looking for update in Order check with <a href="{{ url('/order/update/'.$orderId) }}">Order Update</a>.</p>
        <br><br>

        <div class="nx-links">
            <a href="javascript:void(0)" class="nx-btn btn-lg" id="order-delete">Delete Order</a>
            <a href="javascript:void(0)" class="nx-btn btn-lg" id="order-call">Send Discussion Call Request</a>
            <a href="{{ url('/order/list') }}" class="nx-btn btn-lg">Orders List</a>
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
    </div>
    
</div></div>

<script type="text/javascript">
    $(document).ready(function() {
    
        $("#order-delete").click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var order = '<?php echo $orderCode; ?>';
            
            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/orderdelete/'.$orderId) }}",
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