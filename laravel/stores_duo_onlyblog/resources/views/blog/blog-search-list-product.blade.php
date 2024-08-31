@extends('layouts.blog')

@section('title')
Product Search Result | WebCraftShop
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

<div class="container sec-s60">
    <div class="blog-main col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="wishlist-head">
            <h2 class="head-h2">Product Search List</h2>
        </div>
        
        <div class="wishlist infinite-scroll">
        @foreach($productList as $product)
        <div class="prod-layout col-lg-4 col-sm-6 col-xs-6">
            <div class="item-container">
                <div class="item-img">
                    @foreach($productImage[$product->id] as $image)
                    <img src="public/storage/product/{{ $image->imageName }}" class="img-responsive" title="Product Image">
                    @endforeach
                </div>
                @if($product->mark)
                <span class="item-tag">{{ $product->mark }}</span>
                @endif
                <div class="item-words text-center">
                    <h4><a class="lead-text" href="{{ url('/product/'.$product->productNameSlug) }}">{{ $product->productName }}</a></h4>
                    <div class="item-rat hidden">
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="item-wishlist">
                        <a href="javascript:void(0)" id="remove-wishlist" data-wishlist="{{ $product->id }}" class="btn btn-default btn-sm remove-wishlist" title="Remove From Wishlist"><i class="fa fa-minus"></i></a>
                    </div>
                    <div class="item-price">
                        <span class="pri-new"><i class="fa fa-{{ $product->currency }}"></i> {{ $product->finalPrice }}</span>
                        <span class="pri-old"><i class="fa fa-{{ $product->currency }}"></i> {{ $product->price }}</span>
                        <span class="pri-discount">(@php echo round($product->discount) @endphp%) OFF</span>
                    </div>
                    <div class="item-desc hidden">
                        <p class="p-text">{{ $product->shortDescription }}</p>
                    </div>
                    <div class="item-btn text-center hidden">
                        <button class="btn btn-1" data-toggle="tooltip" data-placement="top" title="Ask For Quote"><i class="fa fa-shopping-bag"></i>Ask for Quote</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div><!-- End of Infinite Scroll -->
    </div>

    <div class="blog-side col-sm-4 col-md-4 col-lg-4 col-xs-12"><!-- XS view components will be present inbetween of main sec -->
        @include('blog.blog-sidebar-home')
    </div>
</div>

<script src="{{ asset('public/js/jquery.jscroll.min.js') }}"></script>


@endsection