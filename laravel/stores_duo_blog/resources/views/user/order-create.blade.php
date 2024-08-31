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
        <h2 class="home-h2">Place Order with <span>StoresBuzz</span></h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-order"><div class="container">
    <div class="nx-form row col-xs-12 col-sm-6 col-md-4 col-lg-6 col-md-offset-4 col-sm-offset-3 col-lg-offset-3">
        <form class="edit p20_" action="{{ url('order/create') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h3 class="nx-formhead">Personal Details:</h3>
            <p class="text-center">Personal Details of Customers are necessary before placing order. <strong>Same Details will be used for Billing of order.</strong> Tips are given for details of each field; Go through them before filling a section.</p><br>

            <div class="form-group row p5_">
                <div class="dropdown dropdown-currency">
                    <span class="dropdown-toggel input-lg form-control" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        * Currency of Payment - {{ $pageData['pageCurrency'] }}
                    </span>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/order/create/INR') }}"><i class="fa fa-inr"></i> INR</a></li>
                        <li><a href="{{ url('/order/create/USD') }}"><i class="fa fa-usd"></i> USD</a></li>
                        <li><a href="{{ url('/order/create/GBP') }}"><i class="fa fa-gbp"></i> GBP</a></li>
                        <li><a href="{{ url('/order/create/EUR') }}"><i class="fa fa-eur"></i> EUR</a></li>
                    </ul>
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('orderName') ? ' has-error' : '' }}">
                <div class="">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Full Name"
                        name="orderName" 
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
                        name="orderOrgName" 
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
                        name="orderEmail" 
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
                        name="orderContactNo" 
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
                        name="orderCurrency" required
                        value="{{ $pageData['pageCurrency'] }}">
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrText') ? ' has-error' : '' }}">
                <div class="">
                    <textarea 
                        class="textarea form-control input-lg" rows="3" placeholder="* Address"
                        name="addrText" maxlength="150"  
                        required></textarea>
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
                        name="addrCity" value="{{ $currentIp['city'] }}"
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
                        name="addrState" value="{{ $currentIp['state_name'] }}"
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
                        name="addrCountry" value="{{ $currentIp['country'] }}"
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
                        name="addrPincode" maxlength="15" required>
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
                        name="addrChat" 
                        maxlength="100">
                    <p class="pull-right">(Add for Easy Messaging)</p>
                </div>
            </div>


            <hr>
            <h3 class="nx-formhead">Order Details:</h3><br>
            <h4>Select Website you want to build with us.</h4>

            <div class="form-group row p20_">
                <select class="form-control input-lg" name="productCode" id="productCode" required>
                    <option value="SHOWCASE">Company Profile Static - {{ $pageData['pageCurrency'] .' '.$pageData['costStatic'] }}</option>
                    <option value="PROFILE">Company Profile with Dashboard - {{ $pageData['pageCurrency'] .' '.$pageData['costDynamic'] }}</option>
                    <option value="BLOG">Blogging Website - {{ $pageData['pageCurrency'] .' '.$pageData['costBlog'] }}</option>
                    <option value="ECOMMERCE">E-Commerce Website - {{ $pageData['pageCurrency'] .' '.$pageData['costStore'] }}</option>
                    <option value="CUSTOM">Your Idea with Custom Design &amp; Functions</option>
                </select>
            </div>

            <div class="form-group row p5_{{ $errors->has('orderDescription') ? ' has-error' : '' }}">
                <div class="">
                    <textarea 
                        class="textarea form-control input-lg" rows="6" placeholder="Describe Your thoughts, Any suggestion website."
                        name="orderDescription" 
                        maxlength="4000" required></textarea>
                    <p class="pull-right">(Max 1600 words)</p>
                    @if ($errors->has('orderDescription'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orderDescription') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!--You can Share color you want use for website, Share Any Sample Website that you have seen. What is basic Idea behind the components that you have selected.-->


            <hr>
            <h3 class="nx-formhead">Components You Selected:</h3>

            <div class="components p20_">
                <ul class="list-unstyled">
                    @if (!$selections)
                        <?php echo "No Components Selected."; ?>
                    @endif

                    @foreach((array)$selections as $s)
                    <li class="li-component">{{ $s->typeName }}</li>
                    @endforeach
                </ul>
            </div><br><br>


            <p>Want to change Selected components? <a href="{{ url('/template') }}">CLICK HERE</a></p>

            <div class="form-group row p20_">
                <hr>
                <input type="checkbox" name="orderTerms" id="orderTerms" value="1" require></input>
                <p class="terms">I have read and agree with StoresBuzz terms and conditions.</p><br><br>

                <input type="submit" name="submit" class="btn btn-default btn-lg" id="order-active" value="Save Order" />
                <p class="p40_">(Once Order is Saved Your selected components will be added to your Order. They can't be changed afterwards. Yeah, But of course You can mention any change in components on order status page in comments. Personal details can be updated after saving this order also.)</p>
            </div>
        </form>
        
    </div>
</div></div>


@endsection