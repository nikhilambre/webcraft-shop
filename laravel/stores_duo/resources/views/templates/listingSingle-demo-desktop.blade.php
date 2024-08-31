@extends('templates.layout-singleList-desktop')

@section('customStyle')
@foreach ($template as $temp)
<link rel="stylesheet" href="{{ url('/public/css/'.$temp->customStyle.'.css') }}" type='text/css' />
@endforeach
@endsection

@section('vendorStyle')
@foreach ($template as $temp)
{!! $temp->vendorStyle !!}
@endforeach
@endsection

@section('fonts')
@foreach ($template as $temp)
{!! $temp->fonts !!}
@endforeach
@endsection


@section('htmlContent')
@foreach ($template as $temp)
{!! $temp->htmlContent !!}
@endforeach
@endsection


@section('vendorScripts')
@foreach ($template as $temp)
{!! $temp->vendorScripts !!}
@endforeach
@endsection

@section('scripts')
@foreach ($template as $temp)
{!! $temp->scripts !!}
@endforeach
@endsection
