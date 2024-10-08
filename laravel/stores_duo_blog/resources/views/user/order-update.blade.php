@extends('layouts.user')

@section('title')
StoresBuzz | Build your own website | Ecommerce web store India
@endsection

@section('description')
StoresBuzz is best website builder for online shopping websites, Working to bring all small business online. We know 'How to make your own website?'')
@endsection

@section('keywords')
best website builder, online store, ecommerce website, ecomerce, online store website, Free hosting, ecommerce platforms, buy online, storesbuzz, e commerce, website maker
@endsection

@section('page-image')
https://www.storesbuzz.com/public/images/logo.png
@endsection


@section('content')

<div class="nx-home"><div class="container">
    <div class="home-box">
        <h2 class="home-h2">Order with <span>StoresBuzz</span></h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>


<div class="nx-order"><div class="container">
    <div class="nx-form row col-xs-12 col-sm-6 col-md-4 col-lg-6 col-md-offset-4 col-sm-offset-3 col-lg-offset-3">
        <form class="edit p20_" action="{{ url('order/update/'.$orderId) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h3 class="nx-formhead">Personal Details:</h3>
            <p class="text-center">Personal Details of Customers are necessary before placing order. <strong>Same Details will be used for Billing of order.</strong> Tips are given for details of each field; Go through them before filling a section.</p><br>

            @foreach($orders as $data)

            <div class="form-group row p5_">
                <div class="dropdown dropdown-currency">
                    <span class="dropdown-toggel input-lg form-control" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        * Currency of Payment - {{ $pageData['pageCurrency'] }}
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/order/update/'.$data->id.'/INR') }}"><i class="fa fa-inr"></i> INR</a></li>
                        <li><a href="{{ url('/order/update/'.$data->id.'/USD') }}"><i class="fa fa-usd"></i> USD</a></li>
                        <li><a href="{{ url('/order/update/'.$data->id.'/GBP') }}"><i class="fa fa-gbp"></i> GBP</a></li>
                        <li><a href="{{ url('/order/update/'.$data->id.'/EUR') }}"><i class="fa fa-eur"></i> EUR</a></li>
                    </ul>
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
            <h4>Website you want to build with us.</h4>

            <div class="form-group row p20_">
                <select class="form-control input-lg" name="productCode" id="productCode" required>
                    <option value="SHOWCASE" <?php if($data->productCode == 'SHOWCASE') echo 'selected'; ?>>Company Profile Static - {{ $pageData['pageCurrency'] .' '.$pageData['costStatic'] }}</option>
                    <option value="PROFILE" <?php if($data->productCode == 'PROFILE') echo 'selected'; ?>>Company Profile with Dashboard - {{ $pageData['pageCurrency'] .' '.$pageData['costDynamic'] }}</option>
                    <option value="BLOG" <?php if($data->productCode == 'BLOG') echo 'selected'; ?>>Blogging Website - {{ $pageData['pageCurrency'] .' '.$pageData['costBlog'] }}</option>
                    <option value="ECOMMERCE" <?php if($data->productCode == 'ECOMMERCE') echo 'selected'; ?>>E-Commerce Website - {{ $pageData['pageCurrency'] .' '.$pageData['costStore'] }}</option>
                    <option value="CUSTOM" <?php if($data->productCode == 'CUSTOM') echo 'selected'; ?>>Your Idea with Custom Design &amp; Functions</option>
                </select>
            </div>

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
            <br><br>
            <h4>Components linked with Order can't be changed.</h4>

            <div class="form-group row p20_">
                <hr>
                <input type="submit" name="submit" class="btn btn-default btn-lg" id="order-active" value="Update Order" />
            </div>

            @endforeach
        </form>
    </div>
</div></div>


@endsection