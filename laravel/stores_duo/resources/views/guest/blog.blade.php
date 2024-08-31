@extends('layouts.main')

@section('title')
Blogs - WebCraft Shop | Build your own website | Websites store India
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
<div class="no-home">
    <div class="no-back"></div>
    <div class="container">
        <div class="home-box">
            <h2 class="home-h2">Blogs</h2>
            <p class="home-p">We are Supporting all Major type of Websites for Now and In Up Coming versions we are willing to add More Components and Types of Featured Websites.</p>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="container">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

        <h2 class="section-head row">Blog Posts</h2>
        @foreach ($category as $catg)
        <div class="sec-s35 row"><!-- 3 Blocks with image for blog -->
            <h2 class="section-head row">{{ $catg->categoryName }}</h2><br>

            @foreach ($categoryBlog[$catg->id] as $catlist)
            <div class="s35-bs col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="padding-left: 0;">
                <div class="bs-img">
                    <img class="img" src="{{ url('public/storage/blog/'.$catlist->postImgName) }}" alt="blog image">
                </div>
                <h3 class="bs-h3">
                    <a href="{{ url('/post/'.$catlist->postTitleSlug) }}">{{ $catlist->postTitle }}</a>
                </h3>
                <span class="bs-date">{{ date('d-M', strtotime($catlist->created_at)) }}</span>
            </div>
            @endforeach
        </div><!-- End of s35 here -->
        @endforeach
    </div>

    <div class="hedden-xs col-sm-3 col-md-3 col-lg-3"><!-- XS view components will be present inbetween of main sec -->
        @include('guest.blog-sidebar')
    </div>

</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#hed1-navbar-collapse').addClass("hed1-col3");
});
</script>
@endsection