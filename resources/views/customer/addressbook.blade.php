@extends('layouts.home')
@php
$d = '';
$ma = '';
$cp = '';
$ab = 'active';
$or = '';
@endphp
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>address book</h2>
                        <ul>
                            <li><a href="{{ route('customer.dashboard') }}">dashboard</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">address book</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space bg-light">
    <div class="container">
        <div class="row">
            @include('customer.partials.sidebar')
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>Address Book</h2>
                        </div>
                        <form method="POST" action="{{ route('customer.addressbook.update', ['id'=>Auth::guard('customer')->user()->id]) }}" class="theme-form">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('billing_first_name') ? ' has-error' : '' }}">
                                <label for="billing_first_name">Billing First Name:</label>
                                <input type="text" class="form-control" name="billing_first_name" placeholder="Billing First Name" value="{{ $customer->billing_first_name }}">
    
                                @if ($errors->has('billing_first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('billing_last_name') ? ' has-error' : '' }}">
                                <label for="billing_last_name">Billing Last Name:</label>
                                <input type="text" class="form-control" name="billing_last_name" placeholder="Billing First Name" value="{{ $customer->billing_last_name }}">
    
                                @if ($errors->has('billing_last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('billing_country') ? ' has-error' : '' }}">
                                <label for="billing_country">Billing Country:</label>
                                <input type="text" class="form-control" name="billing_country" placeholder="Billing First Name" value="{{ $customer->billing_country }}">
    
                                @if ($errors->has('billing_country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('billing_address_1') ? ' has-error' : '' }}">
                                <label for="billing_address_1">Billing Address 1:</label>
                                <input type="text" class="form-control" name="billing_address_1" placeholder="Billing First Name" value="{{ $customer->billing_address_1 }}">
    
                                @if ($errors->has('billing_address_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_address_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="billing_address_2">Billing Address 2:</label>
                                <input type="text" class="form-control" name="billing_address_2" placeholder="Billing First Name" value="{{ $customer->billing_address_2 }}">
                            </div>
                            <div class="form-group{{ $errors->has('billing_state') ? ' has-error' : '' }}">
                                <label for="billing_state">Billing State:</label>
                                <input type="text" class="form-control" name="billing_state" placeholder="Billing First Name" value="{{ $customer->billing_state }}">
    
                                @if ($errors->has('billing_state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_state') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('billing_city') ? ' has-error' : '' }}">
                                <label for="billing_city">Billing City:</label>
                                <input type="text" class="form-control" name="billing_city" placeholder="Billing First Name" value="{{ $customer->billing_city }}">
    
                                @if ($errors->has('billing_city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('billing_postcode') ? ' has-error' : '' }}">
                                <label for="billing_postcode">Billing Post Code:</label>
                                <input type="text" class="form-control" name="billing_postcode" placeholder="Billing First Name" value="{{ $customer->billing_postcode }}">
    
                                @if ($errors->has('billing_postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('billing_postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            <div class="form-group">
                                <h4> Is Shipping Details The Same ? </h4>
                                @php
                                    if(!isset($_SESSION['is_shipping_address_same'])){
                                        $_SESSION['is_shipping_address_same'] = "yes";
                                    }
                                @endphp
                                <input type="radio" name="is_shipping_address_same" value="yes"
                                @php
                                    if(@$_SESSION['is_shipping_address_same'] == 'yes'){ echo "checked"; }
                                @endphp
                                >
                                <label> Yes </label>
                                <input type="radio" name="is_shipping_address_same" value="no"
                                @php
                                    if(@$_SESSION['is_shipping_address_same'] == 'no'){ echo "checked"; }
                                @endphp
                                >
                                <label> No </label>
                            </div>
                            <div id="shipping">
                                <div class="form-group">
                                <label for="shipping_first_name">Shipping First Name:</label>
                                <input type="text" class="form-control" name="shipping_first_name" placeholder="Shipping First Name" value="{{ $customer->shipping_first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_last_name">Shipping Last Name:</label>
                                <input type="text" class="form-control" name="shipping_last_name" placeholder="Shipping First Name" value="{{ $customer->shipping_last_name }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_country">Shipping Country:</label>
                                <input type="text" class="form-control" name="shipping_country" placeholder="Shipping First Name" value="{{ $customer->shipping_country }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_address_1">Shipping Address 1:</label>
                                <input type="text" class="form-control" name="shipping_address_1" placeholder="Shipping First Name" value="{{ $customer->shipping_address_1 }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_address_2">Shipping Address 2:</label>
                                <input type="text" class="form-control" name="shipping_address_2" placeholder="Shipping First Name" value="{{ $customer->shipping_address_2 }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_state">Shipping State:</label>
                                <input type="text" class="form-control" name="shipping_state" placeholder="Shipping First Name" value="{{ $customer->shipping_state }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_city">Shipping City:</label>
                                <input type="text" class="form-control" name="shipping_city" placeholder="Shipping First Name" value="{{ $customer->shipping_city }}">
                            </div>
                            <div class="form-group">
                                <label for="shipping_postcode">Shipping Post Code:</label>
                                <input type="text" class="form-control" name="shipping_postcode" placeholder="Shipping First Name" value="{{ $customer->shipping_postcode }}">
                            </div>    
                            </div>
                            <button type="submit" class="btn btn-success btn-md">Add to Address Book</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection