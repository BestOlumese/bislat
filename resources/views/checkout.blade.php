@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>checkout</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">checkout</a></li>
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
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form  method="POST" action="{{ route('order') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3></div>
                            <div class="theme-form">
                                <div class="row check-out ">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12{{ $errors->has('billing_first_name') ? ' has-error' : '' }}">
                                        <label>First Name</label>
                                        <input type="hidden" name="customer_address_id" value="{{ $customer->id }}">
                                        <input type="text" name="billing_first_name" value="{{ $customer->billing_first_name }}" placeholder="">
                                        @if ($errors->has('billing_first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12{{ $errors->has('billing_last_name') ? ' has-error' : '' }}">
                                        <label>Last Name</label>
                                        <input type="text" name="billing_last_name" value="{{ $customer->billing_last_name }}" placeholder="">
                                        @if ($errors->has('billing_last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12{{ $errors->has('billing_country') ? ' has-error' : '' }}">
                                        <label class="field-label">Country</label>
                                        <input type="text" name="billing_country" value="{{ $customer->billing_country }}" placeholder="">
                                        @if ($errors->has('billing_country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12{{ $errors->has('billing_address_1') ? ' has-error' : '' }}">
                                        <label class="field-label">Billing Address 1</label>
                                        <input type="text" name="billing_address_1" value="{{ $customer->billing_address_1 }}" placeholder="">
                                        @if ($errors->has('billing_address_1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_address_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Billing Address 2</label>
                                        <input type="text" name="billing_address_2" value="{{ $customer->billing_address_2 }}" placeholder="Street address">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12{{ $errors->has('billing_state') ? ' has-error' : '' }}">
                                        <label class="field-label">Billing State</label>
                                        <input type="text" name="billing_state" value="{{ $customer->billing_state }}" placeholder="">
                                        @if ($errors->has('billing_state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12{{ $errors->has('billing_city') ? ' has-error' : '' }}">
                                        <label class="field-label">Billing City</label>
                                        <input type="text" name="billing_city" value="{{ $customer->billing_city }}" placeholder="">

                                        @if ($errors->has('billing_city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12{{ $errors->has('billing_postcode') ? ' has-error' : '' }}">
                                        <label class="field-label">Billing Post Code</label>
                                        <input type="text" name="billing_postcode" value="{{ $customer->billing_postcode }}" placeholder="">
                                        @if ($errors->has('billing_postcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('billing_postcode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
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
                                    <div id="shipping" class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <h3>Shipping Details</h3>
                                        <div class="{{ $errors->has('shipping_first_name') ? ' has-error' : '' }}">
                                        <label class="mb-2">First Name</label>
                                        <input type="text" name="shipping_first_name" value="{{ $customer->shipping_first_name }}" placeholder="">
                                        @if ($errors->has('shipping_first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div><br>
                                    <div class="{{ $errors->has('shipping_last_name') ? ' has-error' : '' }}">
                                        <label class="mb-2">Last Name</label>
                                        <input type="text" name="shipping_last_name" value="{{ $customer->shipping_last_name }}" placeholder="">
                                        @if ($errors->has('shipping_last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div><br>
                                    <div class="{{ $errors->has('shipping_country') ? ' has-error' : '' }}">
                                        <label class="field-label mb-2">Country</label>
                                        <input type="text" name="shipping_country" value="{{ $customer->shipping_country }}" placeholder="">
                                        @if ($errors->has('shipping_country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_country') }}</strong>
                                            </span>
                                        @endif
                                    </div><br>
                                    <div class="{{ $errors->has('shipping_address_1') ? ' has-error' : '' }}">
                                        <label class="field-label mb-2">Shipping Address 1</label>
                                        <input type="text" name="shipping_address_1" value="{{ $customer->shipping_address_1 }}" placeholder="">
                                        @if ($errors->has('shipping_address_1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_address_1') }}</strong>
                                            </span>
                                        @endif
                                    </div><br>
                                    <div>
                                        <label class="field-label mb-2">Shipping Address 2</label>
                                        <input type="text" name="shipping_address_2 mb-2" value="{{ $customer->shipping_address_2 }}" placeholder="Street address">
                                    </div><br>
                                    <div class="{{ $errors->has('shipping_state') ? ' has-error' : '' }}">
                                        <label class="field-label mb-2">Shipping State</label>
                                        <input type="text" name="shipping_state" value="{{ $customer->shipping_state }}" placeholder="">
                                        @if ($errors->has('shipping_state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_state') }}</strong>
                                            </span>
                                        @endif
                                    </div><br>
                                    <div class="{{ $errors->has('shipping_city') ? ' has-error' : '' }}">
                                        <label class="field-label mb-2">Shipping City</label>
                                        <input type="text" name="shipping_city" value="{{ $customer->shipping_city }}" placeholder="">

                                        @if ($errors->has('shipping_city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_city') }}</strong>
                                            </span>
                                        @endif
                                    </div><br>
                                    <div class="{{ $errors->has('shipping_postcode') ? ' has-error' : '' }}">
                                        <label class="field-label mb-2">Shipping Post Code</label>
                                        <input type="text" name="shipping_postcode" value="{{ $customer->shipping_postcode }}" placeholder="">
                                        @if ($errors->has('shipping_postcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('shipping_postcode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @foreach(Cart::content() as $pdt)
                                            <li>{{ $pdt->name }} × {{ $pdt->qty }} <span>&#8358; {{ $pdt->total() }}</span></li>
                                        @endforeach
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">&#8358; {{ Cart::total() }}</span></li>
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count">&#8358; {{ Cart::total() }}</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment-group" id="payment-3">
                                                        <label for="payment-3">Quickteller</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right"><button type="submit" class="btn-normal btn" id="payment-btn2">Cash On Delivery</button><a href="#" class="btn-normal btn" id="payment-btn3">Quickteller</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection