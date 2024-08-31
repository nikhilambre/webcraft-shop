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
        <h2 class="home-h2">Order Data requirments</h2>
        <h3>StoresBuzz needs following data from you to update in your website.</h3>
    </div>
</div></div>

<div class="nx-saved"><div class="container p40_">
    <h4>ORDER ID : {{ $orderCode }}</h4><br>
    <p>We need following data fro you to upload in your webpage. As we receive data will mark it in following List</p>
    <p>We have a sample Content File for your reference and understanding <a href="{{ url('/order/download/requirements') }}">Download Here</a></p>
</div></div>

<div class="nx-order"><div class="container">
    @foreach ($orderdata as $data)
    <div class="show row">
        <div class="show-left col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div><h5>Order Requirments Status</h5></div>
            <dl class="dl-horizontal">
                <dt>*Domain Name :</dt><dd>{{ $data->domainName }}</dd>
                <dt>*Tag Line :</dt><dd>{{ $data->tagLine }}</dd>
                <dt>*Contact Email :</dt><dd>{{ $data->contactEmail }}</dd>
                <dt>*Contact Address 1 :</dt><dd>{{ $data->contactAddr1 }}</dd>
                <dt>Contact Address 2 :</dt><dd>{{ $data->contactAddr2 }}</dd>
                <dt>SEO Content :</dt><dd>{{ $data->seoContent }}</dd>
                <dt>*Content File :</dt><dd>{{ $data->contentFile }}</dd>
            </dl>
        </div>

        <div class="show-right col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div><h5>&nbsp;</h5></div>
            <dl class="dl-horizontal">
                <dt>*Page Content :</dt><dd>{{ $data->pageContent }}</dd>
                <dt>*Images :</dt><dd>{{ $data->images }}</dd>
                <dt>*Brand Image/Icon :</dt><dd>{{ $data->brandImage }}</dd>
                <dt>Favicon :</dt><dd>{{ $data->favicon }}</dd>
                <dt>Video :</dt><dd>{{ $data->video }}</dd>
                <dt>Video Link :</dt><dd>{{ $data->videoLink }}</dd>
                <dt>font :</dt><dd>{{ $data->font }}</dd>
            </dl>
        </div>
    </div>
    @endforeach
</div></div>

@endsection