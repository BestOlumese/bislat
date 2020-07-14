@extends('layouts.home')
@php
$d = '';
$ma = '';
$cp = '';
$ab = '';
$or = 'active';
@endphp
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>orders</h2>
                        <ul>
                            <li><a href="{{ route('customer.dashboard') }}">dashboard</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">orders</a></li>
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
                            <h2>My Orders</h2>
                        </div>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Invoice Id</th>
                                <th>Product Title</th>
                                <th>Product Price</th>
                                <th>qty</th>
                                <th>Payment Method</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    @if ($order->customer_id ==  Auth::guard('customer')->user()->id)
                                        <tr>
                                            <td>#{{ $order->invoice_no }}</td>
                                            <td>{{ $order->product->title }}</td>
                                            <td>&#8358; {{ $order->due_amount }}</td>
                                            <td>{{ $order->qty }}</td>
                                            <td><span class="badge badge-secondary">{{ $order->payment_method }}</span></td>
                                        </tr>
                                    @endif
                                @endforeach       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection