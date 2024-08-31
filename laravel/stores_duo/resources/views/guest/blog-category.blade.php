@extends('layouts.main')

@section('title')
Blog Category - WebCraft Shop | Build your own website | Websites store India
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
<div class="nt-home">
    <div class="nt-back"></div>
    <div class="container">
        <div class="home-box">
            <h2 class="home-h2">Ecommerce</h2>
            <p class="home-p">We are Supporting all Major type of Websites for Now and In Up Coming versions we are willing to add More Components and Types of Featured Websites.</p>
        </div>
    </div>

    <span class="shop-span-1"></span>
    <span class="shop-span-2"></span>
    <span class="shop-span-3"></span>
</div>

<div class="container">
    <div class="blog-main col-xs-12 col-sm-8 col-md-8 col-lg-8">

        <div class="infinite-scroll">
        @foreach ($postList as $post)
        <div class="sec-s52">
            <div class="post-tags">
                @foreach ($tags[$post->id] as $tag)
                <a href="{{ url('/tag/'.$tag->tagNameSlug) }}" class="p-text">{{ $tag->tagName }}, </a>
                @endforeach
            </div>
            <div class="post-title">
                <h3 class="head-text"><a href="{{ url('/post/'.$post->postTitleSlug) }}">{{ $post->postTitle }}</a></h3>
            </div>
            <div class="post-author">
                <a href="{{ url('/author/'.$post->authorNameSlug) }}">{{ $post->authorName }}</a> . <span class="p-text post-date">{{ date('d-M', strtotime($post->created_at)) }}</span>
            </div>
            <div class="post-img">
                <img class="img" src="{{ url('public/storage/blog/'.$post->postImgName) }}" alt="blog image">
            </div>
            <div class="post-short-desc">
                <p class="p-text">{{ $post->postSubTitle }}</p>
            </div>
        </div>
        @endforeach
        </div><!-- End of Infinite Scroll -->
        {{ $postList->links() }}
    </div>

    <div class="blog-side col-sm-4 col-md-4 col-lg-4 col-xs-12"><!-- XS view components will be present inbetween of main sec -->
        @include('blog.blog-sidebar-home')
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