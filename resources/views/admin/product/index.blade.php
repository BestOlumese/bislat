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
                                <h3>All Products
                                    <small>Bislat Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">All Products</li>
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
                                <h5>All Products</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Total Products</th>
                                            <th>Published</th>
                                            <th colspan="3">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @if ($products->count() !== 0)
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>
                                                            {{ $product->title }}
                                                        </td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->total_products }}</td>
                                                        <td>
                                                            @if ($product->is_published == 1)
                                                                Published
                                                            @else
                                                                Pending for admin aproval
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="fa fa-pencil btn btn-primary text-white">Edit</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('product.destroy', ['id' => $product->id]) }}" class="fa fa-trash btn btn-danger text-white">Delete</a>
                                                        </td>
                                                        @if (auth()->user()->admin == 1)
                                                            <td>
                                                                @if ($product->is_published == 0)
                                                                    <a href="{{ route('product.publish', ['id' => $product->id]) }}" class="btn btn-success text-white">Publish</a>
                                                                @else
                                                                    <a href="{{ route('product.unpublish', ['id' => $product->id]) }}" class="btn btn-danger text-white">Unpublish</a>
                                                                @endif
                                                            </td>
                                                        @endif
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
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        @include('admin.partials.footer')
        <!-- footer end-->
    </div>

</div>
@endsection
