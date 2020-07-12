@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>wishlist</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="wishlist-section section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    @foreach ($wishpro as $product)
                        @foreach ($wishlists as $wishlist)
                            @if ($wishlist->product_id == $product->id)
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ route('productview', ['slug'=>$product->slug]) }}"><img src="{{ asset($product->image1) }}" alt="product" class="img-fluid  "></a>
                                    </td>
                                    <td><a href="#">{{ $product->title }}</a>
                                        <div class="mobile-cart-content row">
                                            <div class="col-xs-3">
                                                <p>in stock</p>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">$63.00</h2></div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color"><a href="#" class="icon mr-1"><i class="ti-close"></i> </a><a href="#" class="cart"><i class="ti-shopping-cart"></i></a></h2></div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>
                                            @if ($product->label == 'gift')
                                                &#8358; @convert($product->price_discount)
                                            @else
                                                &#8358; @convert($product->price)
                                            @endif    
                                        </h2></td>
                                    <td><a href="{{ route('wishlist.delete', ['productid'=>$product->id, 'userid'=>Auth::guard('customer')->user()->id]) }}" class="icon mr-3"><i class="ti-close"></i> </a><a href="{{ route('productview', ['slug'=>$product->slug]) }}" class="cart"><i class="ti-shopping-cart"></i></a></td>
                                </tr>
                                </tbody>
                            @endif
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="{{ route('index') }}" class="btn btn-normal">continue shopping</a> <a href="{{ route('wishlist.delete_all', ['userid'=>Auth::guard('customer')->user()->id]) }}" class="btn btn-normal">clear all wish in list</a></div>
        </div>
    </div>
</section>
<!--section end-->
@endsection