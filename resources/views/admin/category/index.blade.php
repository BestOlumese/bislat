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
                                <h5>Products Category</h5>
                            </div>
                            <div class="card-body">
                            <div class="btn-popup pull-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Category</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Category</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                                                        {{ csrf_field() }}
                                                        <div class="form">
                                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                                <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                                <input class="form-control" name="name" id="validationCustom01" value="{{ old('name') }}" type="text">
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
                                                                <label for="validationCustom02" class="mb-1">Category Image :</label>
                                                                <input class="form-control" name="featured" id="validationCustom02" type="file">
                                                                @if ($errors->has('featured'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('featured') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group mb-0{{ $errors->has('content') ? ' has-error' : '' }}">
                                                                <label for="validationCustom02" class="mb-1">Category Description :</label>
                                                                <textarea class="form-control" name="content" cols="10" rows="4"></textarea>
                                                                @if ($errors->has('content'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('content') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                          <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th colspan="2">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @if ($categories->count() !== 0)
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset($category->featured) }}" alt="{{ $category->name }}" width="120px" height="60px">
                                                        </td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="fa fa-pencil btn btn-primary text-white">Edit</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('category.destroy', ['id' => $category->id]) }}" class="fa fa-trash btn btn-danger text-white">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th colspan="5" class="text-center">No categories yet</th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
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
