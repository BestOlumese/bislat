@extends('layouts.home')

@section('content')
    <!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>cart</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="cart-section section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">action</th>
                        <th scope="col">total</th>
                    </tr>
                    </thead>
                    @foreach (Cart::content() as $pdt)
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#"><img src="{{ asset($pdt->model->image1) }}" alt="cart"  class=" "></a>
                                </td>
                                <td><a href="#">{{ $pdt->name }}</a>
                                </td>
                                <td>
                                    <h2>&#8358; @convert($pdt->price)</h2></td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <div class="input-group"><span class="input-group-prepend"><a href="{{ route('cart.decr', ['id' => $pdt->rowId, 'qty' => $pdt->qty ]) }}" class="btn quantity-left-minus"><i class="ti-angle-left"></i></a> </span>
                                                <input type="text" name="qty" class="form-control input-number" value="{{ $pdt->qty }}"> <span class="input-group-prepend"><a href="{{ route('cart.incr', ['id' => $pdt->rowId, 'qty' => $pdt->qty ]) }}" class="btn quantity-right-plus"><i class="ti-angle-right"></i></a></span></div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="{{ route('cart.delete', ['id' => $pdt->rowId ]) }}" class="icon"><i class="ti-close"></i></a></td>
                                <td>
                                    <h2 class="td-color">&#8358; {{ $pdt->total() }}</h2></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td>total price :</td>
                        <td>
                            <h2>&#8358; {{ Cart::total() }}</h2></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="{{ route('index') }}" class="btn btn-normal">continue shopping</a> @if (Auth::guard('customer')->check() && Cart::content()->count() !== 0) <a href="{{ route('checkout') }}" class="btn btn-normal ml-3">check out</a> @endif</div>
        </div>
    </div>
</section>
<!--section end-->
@endsection