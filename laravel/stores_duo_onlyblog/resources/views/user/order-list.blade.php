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
        <h2 class="home-h2">Your Orders <span>StoresBuzz</span></h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-list"><div class="container">

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">
        @if(!$orders->isEmpty())
        <ul class="list-order list-unstyled p20_">
            @foreach($orders as $order)
            <li class="row">
                <h4><i class="fa fa-gift"></i> ORDER ID: <strong>{{ $order->orderCode }}</strong></h4>
                <p class="pull-left">
                    <span>Order Status: </span><span class="label label-info">{{ $order->orderStatus }}</span>
                </p>
                <p class="pull-right" style="margin: 0;"><span>Created On: </span>{{ $order->created_at->toDateString() }}</p><br><br>
                <p class="pull-left">
                    @if ($order->orderStatus == 'INPROGRESS' || $order->orderStatus == 'COMPLETED' || $order->orderStatus == 'HOSTED')
                    <a href="{{ url('/order/status/'.$order->id) }}" class="btn btn-success btn-xs">ORDER STATUS</a>
                    @elseif ($order->orderStatus == 'SAVED')
                    <a href="{{ url('/order/payment/'.$order->id) }}" class="btn btn-success btn-xs">PROCEED TO PAMENT</a>
                    <a href="{{ url('/order/update/'.$order->id) }}" class="btn btn-success btn-xs">UPDATE ORDER</a>
                    <a href="{{ url('/order/delete/'.$order->id) }}" class="btn btn-success btn-xs">DELETE ORDER</a>
                    @elseif ($order->orderStatus == 'CANCELLED')
                    <a href="{{ url('/order/cancelled/'.$order->id) }}" class="btn btn-success btn-xs">ORDER DETAILS</a>
                    @endif
                </p>
            </li>
            @endforeach
        </ul>
        @else
        <div class="text-center p60_">
            <h3>No Orders Found.</h3>
        </div>
        @endif
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
        
    </div>
</div></div>

@endsection