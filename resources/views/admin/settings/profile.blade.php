@extends('layouts.app')

@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    @include('admin.partials.header')
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        @include('admin.partials.sidebar')

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Profile
                                    <small>Bislat Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Settings</li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-details text-center">
                                    @if (!empty(auth()->user()->profile->featured))
                                        <img src="{{ asset(auth()->user()->profile->featured) }}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                    @else
                                        <img src="{{ asset('images/dashboard/designers.jpg') }}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                    @endif
                                    <h5 class="f-w-600 mb-0">{{ auth()->user()->name }}</h5>
                                    <span>{{ auth()->user()->email }}</span>
                                    <div class="social">
                                        <div class="form-group btn-showcase">
                                            @if (!empty(auth()->user()->profile->facebook))
                                                <a href="{{ auth()->user()->profile->facebook }}" target="_blank" class="btn social-btn btn-fb d-inline-block"> <i class="fa fa-facebook"></i></a>
                                            @else
                                                <button class="btn social-btn btn-fb d-inline-block"> <i class="fa fa-facebook"></i></button>
                                            @endif
                                            @if (!empty(auth()->user()->profile->linkedin))
                                                <a href="{{ auth()->user()->profile->linkedin }}" target="_blank" class="btn social-btn btn-twitter d-inline-block"><i class="fa fa-linkedin"></i></a>
                                            @else
                                                <button class="btn social-btn btn-twitter d-inline-block"><i class="fa fa-linkedin"></i></button>
                                            @endif
                                            @if (!empty(auth()->user()->profile->twitter))
                                                <a href="{{ auth()->user()->profile->twitter }}" target="_blank" class="btn social-btn btn-google d-inline-block mr-0"><i class="fa fa-twitter"></i></a>
                                            @else
                                                <button class="btn social-btn btn-google d-inline-block mr-0"><i class="fa fa-twitter"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card tab2-card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="mr-2"></i>Profile</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="settings" class="mr-2"></i>Edit Profile</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                        <h5 class="f-w-600">Profile</h5>
                                        <div class="table-responsive profile-table">
                                            <table class="table table-responsive">
                                                <tbody>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td>{{ auth()->user()->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td>{{ auth()->user()->email }}</td>
                                                </tr>
                                                @if (!empty(auth()->user()->profile->gender))
                                                    <tr>
                                                        <td>Gender:</td>
                                                        <td>Male</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                        <form action="{{ route('profile.update', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="control-label">Name:</label>
                                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Profile Image:</label>
                                                <input type="file" name="featured" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Facebook Url:</label>
                                                <input type="text" name="facebook" class="form-control" @if (!empty(auth()->user()->profile->facebook)) value="{{ auth()->user()->profile->facebook }}" @else placeholder="https://www.facebook.com/johndoe" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Twitter Url:</label>
                                                <input type="text" name="twitter" class="form-control" @if (!empty(auth()->user()->profile->twitter)) value="{{ auth()->user()->profile->twitter }}" @else placeholder="https://www.twitter.com/johndoe" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Linked In Url:</label>
                                                <input type="text" name="linkedin" class="form-control" @if (!empty(auth()->user()->profile->linkedin)) value="{{ auth()->user()->profile->linkedin }}" @else placeholder="https://www.linkedin.com/johndoe" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Gender:</label>
                                                <select name="gender" class="form-control">
                                                    @if (!empty(auth()->user()->profile->gender))
                                                        <option value="{{ auth()->user()->profile->gender }}">{{ auth()->user()->profile->gender }}</option>
                                                    @endif
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        @include('admin.partials.footer')
        <!-- footer end-->
    </div>

</div>
@endsection
