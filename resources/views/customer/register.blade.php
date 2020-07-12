@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>register</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="theme-card">
                    <h3 class="text-center">Create account</h3>
                    <form method="POST" action="{{ route('customer.register.store') }}" class="theme-form">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-12 form-group{{ $errors->has('pnumber') ? ' has-error' : '' }}">
                                <label for="email">Name</label>
                                <input type="text" name="name" class="form-control" id="fname" placeholder="First Name" value="{{ old('name') }}" required="">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group{{ $errors->has('pnumber') ? ' has-error' : '' }}">
                                <label for="pnumber">Phone Number</label>
                                <input type="number" name="pnumber" class="form-control" id="pnumber" placeholder="Phone Number" value="{{ old('pnumber') }}" required="">

                                @if ($errors->has('pnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required="">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="review">Password</label>
                                <input type="password" name="password" class="form-control" id="review" placeholder="Enter your password" required="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="review" placeholder="Enter your confirm password" required="">
                            </div>
                            <div class="col-md-12 form-group"><button type="submit" class="btn btn-normal">create Account</button></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 ">
                                <p >Have you already account? <a href="{{ route('customer.login') }}" class="txt-default">click</a> here to &nbsp;<a href="{{ route('customer.login') }}" class="txt-default">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection