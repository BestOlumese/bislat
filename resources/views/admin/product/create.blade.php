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
                                <h3>Add Products
                                    <small>Bislat Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">Add Product</li>
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
                                <h5>Add Product</h5>
                            </div>
                            <div class="card-body">
                                <div class="row product-adding">
                                    <div class="col-xl-7">
                                        <form action="{{ route('product.store') }}" class="needs-validation add-product-form" novalidate="" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" name="title" type="text" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product name.</div>
                                                </div>
                                                <div class="form-group mb-3 row{{ $errors->has('image1') ? ' has-error' : '' }}">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Image :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" name="image1" type="file" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product image.</div>
                                                    @if ($errors->has('image1'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('image1') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- <div class="form-group mb-3 row{{ $errors->has('image2') ? ' has-error' : '' }}">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Product Image 2 :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" name="image2" type="file">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product image.</div>
                                                    @if ($errors->has('image2'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('image2') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3 row{{ $errors->has('image3') ? ' has-error' : '' }}">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Product Image 3 :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" name="image3" type="file">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product image.</div>
                                                    @if ($errors->has('image3'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('image3') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> --}}
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" name="price" type="number" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter a price.</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Product Discount Price :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" name="price_discount" type="number">
                                                    <label class="col-xl-3 col-sm-4 mb-0"></label>
                                                    <label class="text-muted col-xl-8 col-sm-7">Note: it is not required but if you want to use it product label must be gift</label>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Category :</label>
                                                    <select class="form-control col-xl-8 col-sm-7" name="subcategory_id">
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                    <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                                        <div class="input-group">
                                                            <input class="touchspin" name="total_products" type="text" value="1">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Add Product Details :</label>
                                                    <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                        <textarea id="editor1" name="details" cols="10" rows="4" required=""></textarea>
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product details.</div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Product Label :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" name="label" type="text">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product label.</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Product Keyword :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" name="keyword" type="text" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback offset-sm-4 offset-xl-3">Please enter the product keyword.</div>
                                                </div>
                                            </div>
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary">Add Product</button>
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
