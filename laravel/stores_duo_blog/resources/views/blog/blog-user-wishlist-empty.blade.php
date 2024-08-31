@extends('layouts.blog')

@section('title')
Wishlist Page
@endsection

@section('description')
Website description
@endsection

@section('keywords')
website keywords
@endsection

@section('page-image')
{{ asset('public/images/logo.jpg') }}
@endsection

@section('html-content')
@include('blog.header-home')

<div class="container">
    <div class="empty-cart text-center p100">
        <h3 class="p60">No Items in Your Wishlist. <a href="{{ url('/shop') }}">Continue Shopping.</a></h3>
    </div>
</div>
@endsection