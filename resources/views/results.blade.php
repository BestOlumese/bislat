@extends('layouts.home')
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>search</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">search</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="authentication-page section-big-pt-space bg-light">
    <div class="custom-container">
        <section class="search-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <form method="GET" action="/results" class="form-header">
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" aria-label="Amount (to the nearest dollar)" placeholder="Search Products......">
                                <div class="input-group-append">
                                    <button class="btn btn-normal"><i class="fa fa-search"></i>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<!-- section end -->

<!-- product section start -->
<section class="section-big-py-space ratio_asos bg-light">
    <div class="custom-container">
        <div class="row search-product related-pro1">
            @foreach ($products as $product)
                @if ($product->is_published == 1)
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="product">
                            <div class="product-box">
                                <div class="product-imgbox">
                                <div class="product-front" style="height:200px">
                                    <a href="{{ route('productview', ['slug' => $product->slug]) }}">
                                        <center><img src="{{ asset($product->image1) }}" style="max-width: 190px;max-height:190px;" alt="{{ $product->title }}"></center>
                                    </a>
                                </div>
                                <div class="product-icon icon-inline">
                                    <a href="{{ route('productview', ['slug' => $product->slug]) }}" title="Add to Wishlist">
                                    <i class="ti-bag" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add to Wishlist">
                                    <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </div>
                                </div>
                                <div class="product-detail detail-inline " style="height:120px">
                                <div class="detail-title">
                                    <div class="detail-left">
                                    <div class="rating-star">
                                        <center>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </center>
                                    </div>
                                    <a href="#">
                                        <h6 class="price-title">
                                            <center>{{ $product->title }}</center>
                                        </h6>
                                    </a>
                                    </div>
                                    <div class="detail-right">
                                        @if ($product->label == 'gift')
                                            <div class="check-price">
                                                &#8358; @convert($product->price)
                                            </div>
                                            <div class="price">
                                            <div class="price">
                                                &#8358; @convert($product->price_discount)
                                            </div>
                                            </div>
                                        @else
                                            <div class="price">
                                            <div class="price">
                                                &#8358; @convert($product->price)
                                            </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            
            @if ($products->count() == 0)
                <div class="col-lg-6 offset-lg-4" style="text-transform: uppercase;color: #00baf2;"><h3>No Products Match Your Search</h3></div>
            @endif
        </div>
        @if ($products->count() >= 17)
            <div class="product-pagination">
                <div class="theme-paggination-block">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <nav aria-label="Page navigation">
                                    {{ $products->links() }}
                                </nav>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="product-search-count-bottom">
                                    <h5>Showing Products Result</h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
</section>
<!-- product section end -->


@endsection