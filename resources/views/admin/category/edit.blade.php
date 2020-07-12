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
                                <h3>Category
                                    <small>Bislat Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Products</li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Category</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                                    {{ csrf_field() }}
                                    <div class="form">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="validationCustom01" class="mb-1">Category Name :</label>
                                            <input class="form-control" name="name" value="{{ $category->name }}" id="validationCustom01" value="{{ old('name') }}" type="text">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="mb-1">Category Image :</label>
                                            <input class="form-control" name="featured" id="validationCustom02" type="file">
                                        </div>
                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <label for="validationCustom02" class="mb-1">Category Description :</label>
                                            <textarea class="form-control" name="content" cols="10" rows="4">{{ $category->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
