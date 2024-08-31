@extends('layouts.main')

@section('title')
Order Update Custom - WebCraft Shop | Build your own website | Websites store India
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

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">Order with <span>WebCraft Shop</span></h2>
        <h3>WebCraft Shop values your money and status to provide you more than you need.</h3>
    </div>
</div></div>


<div class="nx-order"><div class="container">
    <div class="nx-form row col-xs-12 col-sm-6 col-md-4 col-lg-6 col-md-offset-4 col-sm-offset-3 col-lg-offset-3">
        <form class="edit p20_" action="{{ route('post.order-update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h3 class="nx-formhead">Personal Details:</h3>
            <p class="text-center">Personal Details of Customers are necessary before placing order. <strong>Same Details will be used for Billing of order.</strong> Tips are given for details of each field; Go through them before filling a section.</p><br>

            @foreach($orders as $data)
            <div class="form-group row p5_ hidden">
                <div class="">
                    <input type="hidden" class="hidden" placeholder="id"
                        name="id" required value="{{ $data->id }}">
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('orderName') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Full Name"
                        name="orderName" value="{{ $data->orderName }}"
                        maxlength="60" required>
                    <p class="pull-right">(This will be used in Invoice)</p>
                    @if ($errors->has('orderName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('orderOrgName') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Organisation Name (or write Personal)"
                        name="orderOrgName" value="{{ $data->orderOrgName }}"
                        maxlength="100" required>
                        @if ($errors->has('orderOrgName'))
                            <span class="help-block">
                                <strong>{{ $errors->first('orderOrgName') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('orderEmail') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="email" class="form-control input-lg" placeholder="* Email ID"
                        name="orderEmail" value="{{ $data->orderEmail }}"
                        maxlength="70" required>
                    <p class="pull-right">(Will be used for our Billing and Communication)</p>
                    @if ($errors->has('orderEmail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderEmail') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('orderContactNo') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Phone Number"
                        name="orderContactNo" value="{{ $data->orderContactNo }}"
                        maxlength="20" required>
                        @if ($errors->has('orderContactNo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('orderContactNo') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_ hidden">
                <div class="">
                    <input type="hidden" class="hidden" placeholder="*Currency"
                        name="orderCurrency" required value="{{ $pageData['pageCurrency'] }}">
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrText') ? ' has-error' : '' }}">
                <div class="">
                    <textarea 
                        class="textarea form-control input-lg" rows="3" placeholder="* Address"
                        name="addrText"
                        maxlength="150" required>{{ $data->addrText }}</textarea>
                        @if ($errors->has('addrText'))
                            <span class="help-block">
                                <strong>{{ $errors->first('addrText') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrCity') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* City"
                        name="addrCity" value="{{ $data->addrCity }}"
                        maxlength="30" required>
                        @if ($errors->has('addrCity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('addrCity') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrState') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* State"
                        name="addrState" value="{{ $data->addrState }}"
                        maxlength="30" required>
                        @if ($errors->has('addrState'))
                            <span class="help-block">
                                <strong>{{ $errors->first('addrState') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrCountry') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Your Country"
                        name="addrCountry" value="{{ $data->addrCountry }}"
                        maxlength="50" required>
                        @if ($errors->has('addrCountry'))
                            <span class="help-block">
                                <strong>{{ $errors->first('addrCountry') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrPincode') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Pin Code or Postal code"
                        name="addrPincode" value="{{ $data->addrPincode }}" 
                        maxlength="15" required>
                        @if ($errors->has('addrPincode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('addrPincode') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row p5_">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="Any Messaging/chat ID (eg: ABC - XYX001)"
                        name="addrChat" value="{{ $data->addrChat }}"
                        maxlength="100">
                    <p class="pull-right">(Add for Easy Messaging)</p>
                </div>
            </div>


            <hr>
            <h3 class="nx-formhead">Order Details:</h3><br>

            <div class="form-group row p5_{{ $errors->has('orderDescription') ? ' has-error' : '' }}">
                <div class="">
                    <textarea 
                        class="textarea form-control input-lg" rows="6" placeholder="Describe Your thoughts, Any suggestion website."
                        name="orderDescription"
                        maxlength="4000" required>{{ $data->orderDescription }}</textarea>
                    <p class="pull-right">(Max 1600 words)</p>
                    @if ($errors->has('orderDescription'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderDescription') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p20_">
                <hr>
                <input type="submit" name="submit" class="btn btn-default btn-lg" id="order-active" value="Update Order" />
            </div>

            @endforeach
        </form>
    </div>
</div></div>


@endsection