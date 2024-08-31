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
        <h2 class="home-h2">Add Your Address</h2>
        <h3>StoresBuzz values your money and status to provide you more than you need.</h3>
    </div>
</div></div>

<div class="nx-list"><div class="container">
    
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 list-box">

        <form class="edit p20_" action="{{ url('order/address/create') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row p5_{{ $errors->has('addrText') ? ' has-error' : '' }}">
                <label for="addrText" class="col-md-2 control-label">*Address</label>
                <div class="col-md-6">
                    <textarea 
                        type="textarea" rows="3" id="addrText" class="form-control input-lg" placeholder="Address"
                        name="addrText"
                        maxlength="200" required></textarea>
                    @if ($errors->has('addrText'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrText') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrCity') ? ' has-error' : '' }}">
                <label for="addrCity" class="col-md-2 control-label">*City</label>
                <div class="col-md-6">
                    <input 
                        type="text" id="addrCity" class="form-control input-lg" placeholder="* City"
                        name="addrCity" 
                        maxlength="30" required>
                    @if ($errors->has('addrCity'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrCity') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrState') ? ' has-error' : '' }}">
                <label for="addrState" class="col-md-2 control-label">*State</label>
                <div class="col-md-6">
                    <input 
                        type="text" id="addrState" class="form-control input-lg" placeholder="State"
                        name="addrState" 
                        maxlength="30" required>
                    @if ($errors->has('addrState'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrState') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrCountry') ? ' has-error' : '' }}">
                <label for="addrCountry" class="col-md-2 control-label">*Country</label>
                <div class="col-md-6">
                    <input 
                        type="text" id="addrCountry" class="form-control input-lg" placeholder="Country"
                        name="addrCountry" 
                        maxlength="40" required>
                    @if ($errors->has('addrCountry'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrCountry') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrPincode') ? ' has-error' : '' }}">
                <label for="addrPincode" class="col-md-2 control-label">*Pin Code</label>
                <div class="col-md-6">
                    <input 
                        type="text" id="addrPincode" class="form-control input-lg" placeholder="Pin Code"
                        name="addrPincode" 
                        maxlength="15" required>
                    @if ($errors->has('addrPincode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrPincode') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrContactNo') ? ' has-error' : '' }}">
                <label for="addrContactNo" class="col-md-2 control-label">Contact No.</label>
                <div class="col-md-6">
                    <input 
                        type="text" id="addrContactNo" class="form-control input-lg" placeholder="Contact No."
                        name="addrContactNo" 
                        maxlength="20">
                    @if ($errors->has('addrContactNo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrContactNo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row p5_{{ $errors->has('addrChat') ? ' has-error' : '' }}">
                <label for="addrChat" class="col-md-2 control-label">Message Contact</label>
                <div class="col-md-6">
                    <input 
                        type="text" id="addrChat" class="form-control input-lg" placeholder="Message Contact"
                        name="addrChat" 
                        maxlength="100">
                    @if ($errors->has('addrChat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addrChat') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="form-group row nx-links">
                <input type="submit" name="submit" class="nx-btn btn-lg" value="Save Address" />
            </div>
        </form>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 list-side">
    </div>

</div></div>




@endsection