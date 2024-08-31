@extends('templates.layout-iframe-mobile')


@section('customStyle')
@foreach ($iframetemp as $temp)
<link rel="stylesheet" href="{{ url('/public/css/'.$temp->customStyle.'.css') }}" type='text/css' />
@endforeach
@endsection

@section('vendorStyle')
@foreach ($iframetemp as $temp)
{!! $temp->vendorStyle !!}
@endforeach
@endsection

@section('fonts')
@foreach ($iframetemp as $temp)
{!! $temp->fonts !!}
@endforeach
@endsection


@section('htmlContent')

@foreach ($iframetemp as $temp)
{!! $temp->htmlContent !!}
@endforeach

@endsection


@section('vendorScripts')
@foreach ($iframetemp as $temp)
{!! $temp->vendorScripts !!}
@endforeach
@endsection

@section('scripts')
@foreach ($iframetemp as $temp)
{!! $temp->scripts !!}
@endforeach
@endsection
