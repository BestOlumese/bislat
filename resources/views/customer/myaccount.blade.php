@extends('layouts.home')
@php
$d = '';
$ma = 'active';
$cp = '';
$ab = '';
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
                        <h2>my account</h2>
                        <ul>
                            <li><a href="{{ route('customer.dashboard') }}">dashboard</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">my account</a></li>
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
                            <h2>My Account</h2>
                        </div>
                        <form method="POST" action="{{ route('customer.myaccount.update', ['id'=>Auth::guard('customer')->user()->id]) }}" class="theme-form">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ $customer->email }}">
    
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('pnumber') ? ' has-error' : '' }}">
                                <label for="pnumber">Phone Number:</label>
                                <input type="number" name="pnumber" class="form-control" id="pnumber" placeholder="Phone Number" value="{{ $customer->pnumber }}">
    
                                @if ($errors->has('pnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success btn-md">Update Account Profile</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection