@extends('layouts.blog')

@section('title')
My Wishlist | WebCraftShop
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
<div class="sec-s60">
<div class="container"><div class="row">

    <div class="wishlist-head">
        <h2 class="head-h2">My Wishlist</h2>
    </div>
    <div class="wishlist">
        @foreach($productList as $product)
        <div class="prod-layout col-lg-3 col-sm-6 col-xs-6">
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
    </div>
</div></div>
</div>

<script type="text/javascript">
$(document).ready(function(){

    $(".remove-wishlist").click(function (){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr("data-wishlist");

        $.ajax({
            type: "POST",
            url: "{{ url('/ajax/removewishlist') }}",
            data: { "_token" : token, "id" : id },
            success : function(d) {
                $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                $('#notify').text('Product Removed From Wishlist.');
                setTimeout(function(){
                    $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                    location.reload();
                }, 3000);
            }
        });
    });
});
</script>
@endsection