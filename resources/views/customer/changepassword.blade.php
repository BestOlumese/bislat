@extends('layouts.home')
@php
$d = '';
$ma = '';
$cp = 'active';
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
                        <h2>change password</h2>
                        <ul>
                            <li><a href="{{ route('customer.dashboard') }}">dashboard</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">change password</a></li>
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
                            <h2>Change Password</h2>
                        </div>
                        <form method="POST" action="{{ route('customer.changepassword.update', ['id'=>Auth::guard('customer')->user()->id]) }}" class="theme-form">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">New Password:</label>
                                <input type="text" name="password" class="form-control" id="password" placeholder="New Password">
    
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-success btn-md">Change Password</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection