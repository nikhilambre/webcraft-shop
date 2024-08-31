@extends('layouts.product')

@section('title')
Privacy Policy | {{ $_ENV['APP_NAME'] }};
@endsection

@section('description')
Privacy Policy of '{{ $_ENV['APP_NAME'] }}'
@endsection

@section('keywords')
{{ $_ENV['APP_NAME'] }}, WebCraft Shop, Website, Products
@endsection

@section('page-image')
https://www.{{ $_ENV['APP_URL'] }}.com/public/images/logo.png
@endsection


@section('html-content')
@include('shared.header-page')

<section class="phe-s1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-content">
                    <h1 class="head-text" data-section="2500">{!! $sc['2500'] !!}</h1>
                    <ul class="breadcumbs list-inline">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Details</li>
                    </ul>
                    <div class="title-line span-after-1">
                        <span class="short-line"></span>
                        <span class="long-line"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-image" style="background-image:url('{{ url('public/images/bg30.jpeg') }}')"></div>
</section>
    
<div class="nf-sec1"><div class="container p40_">
    <p data-section="2501">{!! $sc['2501'] !!}</p><br>
    
    <p data-section="2502">{!! $sc['2502'] !!}</p><br>

    <p data-section="2503">{!! $sc['2503'] !!}</p><br>

    <h4 data-section="2504">{!! $sc['2504'] !!}</h4>
    <p data-section="2505">{!! $sc['2505'] !!}</p><br>

    <h4 data-section="2506">{!! $sc['2506'] !!}</h4>
    <p data-section="2507">{!! $sc['2507'] !!}</p><br>

    <h4 data-section="2508">{!! $sc['2508'] !!}</h4>
    <p data-section="2509">{!! $sc['2509'] !!}</p><br>

    <p  data-section="2523">{!! $sc['2523'] !!}</p><br>

    <h4 data-section="2510">{!! $sc['2510'] !!}</h4>
    <p data-section="2511">{!! $sc['2511'] !!}</p><br>

    <h4 data-section="2522">{!! $sc['2522'] !!}</h4>
    <p data-section="2512">{!! $sc['2512'] !!}</p><br>

    <p data-section="2513">{!! $sc['2513'] !!}</p><br>

    <h4 data-section="2514">{!! $sc['2514'] !!}</h4>
    <p data-section="2515">{!! $sc['2515'] !!}</p><br>

    <h4 data-section="2516">{!! $sc['2516'] !!}</h4>
    <p data-section="2517">{!! $sc['2517'] !!}</p><br>

    <h4 data-section="2518">{!! $sc['2518'] !!}</h4>
    <p data-section="2519">{!! $sc['2519'] !!}</p><br>

    <h4 data-section="2520">{!! $sc['2520'] !!}</h4>
    <p data-section="2521">{!! $sc['2521'] !!}</p><br>
</div></div>

@endsection