@extends('layouts.blog')

@section('title')
Profile Edit Page
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

@foreach($customer as $cust)
<div class="container"><div class="row">
    <div class="sec-s59">
    <div class="profile-left col-md-3 col-xs-12">
        <div class="profile-img">
            <img src="public/storage/user/{{ $cust->customerImgName }}" class="img-thumbnail" alt="Profile Image">
            <p>Member Since: {{ date('d-M-y', strtotime($cust->created_at)) }}</p> 
            <a href="{{ url('/profile-edit') }}" class="btn btn-default">Edit Profile</a>
        </div>
    </div>
    <div class="profile-right col-md-9 col-xs-12">
        <div class="profile-name row">
            <h2>{{ ucfirst($cust->name) }} {{ ucfirst($cust->lastname) }}</h2>
        </div>

        <div class="profile-info sec-s57">
            <form class="" action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Personal Info</h3>

            <div class="form-group row">
                <label for="name" class="hidden-xs col-md-3 text-right">* First Name: </label>
                <div class="col-xs-12 col-md-9">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* First Name"
                        name="name" id="name"
                        maxlength="60" required value="{{ $cust->name }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="hidden-xs col-md-3 text-right">* Last Name: </label>
                <div class="col-xs-12 col-md-9">
                    <input 
                        type="text" class="form-control input-lg" placeholder="* Last Name"
                        name="lastname" id="lastname"
                        maxlength="60" required value="{{ $cust->lastname }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_no" class="hidden-xs col-md-3 text-right">Contact Number: </label>
                <div class="col-xs-12 col-md-9">
                    <input 
                        type="text" class="form-control input-lg" placeholder="Mobile Number"
                        name="contact_no" id="contact_no" 
                        maxlength="18" value="{{ $cust->contact_no }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="userImage" class="hidden-xs col-md-3 text-right">Profile Picture: </label>
                <div class="col-xs-12 col-md-9">
                    <input type="file" class="form-control input-lg" name="userImage" id="userImage">
                    <p class="pull-right"></p>
                </div>
            </div>

            <hr>
            <h3>Delivery Address</h3>
            <div class="form-group row">
                <label for="addrText" class="hidden-xs col-md-3 text-right">Address: </label>
                <div class="col-xs-12 col-md-9">
                    <textarea 
                        class="textarea form-control input-lg" rows="3" placeholder="Address"
                        name="addrText" maxlength="150" 
                        id="addrText" >{{ $cust->addrText }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrCity" class="hidden-xs col-md-3 text-right">City: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="City"
                        name="addrCity" id="addrCity" 
                        maxlength="30" value="{{ $cust->addrCity }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrState" class="hidden-xs col-md-3 text-right">State: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="State"
                        name="addrState" id="addrState" 
                        maxlength="30" value="{{ $cust->addrState }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrCountry" class="hidden-xs col-md-3 text-right">Country: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="Country"
                        name="addrCountry" id="addrCountry" 
                        maxlength="40" value="{{ $cust->addrCountry }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="addrPincode" class="hidden-xs col-md-3 text-right">Pincode: </label>
                <div class="col-xs-12 col-md-6">
                    <input 
                        type="text" class="form-control input-lg" placeholder="Pincode"
                        name="addrPincode" id="addrPincode" 
                        maxlength="15" value="{{ $cust->addrPincode }}">
                    <p class="pull-right"></p>
                </div>
            </div>
            <hr>
            <input type="submit" name="submit" class="btn btn-default btn-lg" id="order-active" value="Edit Profile" />
            </form>
            
        </div>
    </div>
    </div>
</div></div>
@endforeach

@endsection