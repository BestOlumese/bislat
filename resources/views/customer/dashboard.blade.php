@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>dashboard</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">dashbord</a></li>
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
                            <h2>My Dashboard</h2></div>
                        <div class="welcome-msg">
                            <p>Hello, {{  Auth::guard('customer')->user()->name }} !</p>
                            <p>From your Account Dashboard you have the ability to update your account information. Select a link below to view or edit information.</p>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Account Information</h2></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Contact Information</h3><a href="#">Edit</a></div>
                                        <div class="box-content">
                                            <h6>{{  Auth::guard('customer')->user()->name }}</h6>
                                            <h6>{{  Auth::guard('customer')->user()->email }}</h6>
                                            <h6><a href="#">Change Password</a></h6></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>Address Book</h3><a href="#">Edit</a></div>
                                        <div class="box-content">
                                            <p>You can set your default shipping address through this link.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection