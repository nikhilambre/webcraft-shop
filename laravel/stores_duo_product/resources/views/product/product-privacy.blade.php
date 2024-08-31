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
                    <h1 class="head-text" data-section="3000">{!! $sc['3000'] !!}</h1>
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
    <h4 data-section="3001">{!! $sc['3001'] !!}</h4><br>
    <p data-section="3002">{!! $sc['3002'] !!}</p><br>

    <h4 data-section="3003">{!! $sc['3003'] !!}</h4>
    <p data-section="3004">{!! $sc['3004'] !!}</p><br>

    <h4 data-section="3005">{!! $sc['3005'] !!}</h4>
    <p data-section="3006">{!! $sc['3006'] !!}</p><br>
    <p data-section="3007">{!! $sc['3007'] !!}</p><br>

    <h4 data-section="3008">{!! $sc['3008'] !!}</h4>
    <p data-section="3009">{!! $sc['3009'] !!}</p><br>

    <h4 data-section="3010">{!! $sc['3010'] !!}</h4>
    <p data-section="3011">{!! $sc['3011'] !!}</p><br>

    <h4 data-section="3012">{!! $sc['3012'] !!}</h4>
    <p data-section="3013">{!! $sc['3013'] !!}</p><br>

    <h4 data-section="3014">{!! $sc['3014'] !!}</h4>
    <p data-section="3015">{!! $sc['3015'] !!}</p><br>

    <p data-section="3016">{!! $sc['3016'] !!}</p><br>

    <h4 data-section="3017">{!! $sc['3017'] !!}</h4>
    <p data-section="3018">{!! $sc['3018'] !!}</p><br>

    <h4 data-section="3019">{!! $sc['3019'] !!}</h4>
    <p data-section="3020">{!! $sc['3020'] !!}</p><br>

    <p data-section="3021">{!! $sc['3021'] !!}</p><br>

    <p data-section="3022">{!! $sc['3022'] !!}</p><br>
</div></div>

@endsection