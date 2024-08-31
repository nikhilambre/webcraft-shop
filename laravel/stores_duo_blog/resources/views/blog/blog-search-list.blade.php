@extends('layouts.blog')

@section('title')
Blog Search Result | WebCraftShop
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
                <h3 class="head-text"><a href="{{ url('/post/'.$post->id.'/'.$post->postTitle) }}">{{ $post->postTitle }}</a></h3>
            </div>
            <div class="post-author">
                <span class="p-text post-date">{{ date('d-M', strtotime($post->created_at)) }}</span>
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
    </div>

    <div class="blog-side col-sm-4 col-md-4 col-lg-4 col-xs-12"><!-- XS view components will be present inbetween of main sec -->
        @include('blog.blog-sidebar-home')
    </div>
</div>

<script src="{{ asset('public/js/jquery.jscroll.min.js') }}"></script>

@endsection