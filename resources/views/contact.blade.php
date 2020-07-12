@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>contact</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">contacts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="contact-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row section-big-pb-space">
            <div class="col-xl-6 offset-xl-3">
                <h3 class="text-center mb-3">Get in touch</h3>
                <form class="theme-form">
                    <div class="form-row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="name">First Name</label>
                               <input type="text" class="form-control" id="name" placeholder="Enter Your name" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="email">Last Name</label>
                              <input type="text" class="form-control" id="last-name" placeholder="Last Name" required="">
                          </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="review">Phone number</label>
                               <input type="text" class="form-control" id="review" placeholder="Enter your number" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <label for="review">Write Your Message</label>
                                <textarea class="form-control" placeholder="Write Your Message" id="exampleFormControlTextarea1" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-normal" type="submit">Send Your Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection