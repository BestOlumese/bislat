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
                                <h3>View Single Order
                                    <small>Bigdeal Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Sales</li>
                                <li class="breadcrumb-item active">Orders</li>
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
                                <h5>Order Product: {{ $order->product->title }}</h5>
                            </div>
                            <div class="card-body order-datatable text-center" style="font-family: Nunito;">
                                <h4>Order Id: #{{ $order->invoice_no }}</h4><br>
                                <h4>Product Title: {{ $order->product->title }}</h4><br>
                                <h4>Price: &#8358; {{ $order->due_amount }}</h4><br>
                                <h4>Quantity: {{ $order->qty }}</h4><br>
                                <h4>Email: {{ $order->customer->email }}</h4><br>
                                <h4>Phone: {{ $order->customer->pnumber }}</h4><br>
                                <h4>Shipping First Name: {{ $order->addresses->shipping_first_name }}</h4><br>
                                <h4>Shipping Last Name: {{ $order->addresses->shipping_last_name }}</h4><br>
                                <h4>Shipping Country: {{ $order->addresses->shipping_country }}</h4><br>
                                <h4>Shipping Address: {{ $order->addresses->shipping_address_1 }}</h4><br>
                                <h4>Shipping State: {{ $order->addresses->shipping_state }}</h4><br>
                                <h4>Shipping City: {{ $order->addresses->shipping_city }}</h4><br>
                                <h4>Payment Method: {{ $order->payment_method }}</h4><br>
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
