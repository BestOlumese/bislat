@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>category</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">category</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="#">{{ $category->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<section class="section-big-pt-space ratio_asos bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#"><img src="{{ asset($category->category->featured) }}" class="img-fluid  w-100" alt=""></a>
                                    <div class="top-banner-content small-section">
                                        <h4>{{ $category->category->name }}</h4>
                                        <h5>{{ $category->name }}</h5>
                                        <p>{{ $category->category->content }}</p>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                @if ($product->is_published == 1)
                                                    <div class="col-xl-2 mb-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                        <div class="product">
                                                            <div class="product-box">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front" style="height:200px">
                                                                        <center>
                                                                            <a href="{{ route('productview', ['slug' => $product->slug]) }}">
                                                                                <img src="{{ asset($product->image1) }}" style="max-width: 190px;max-height:190px;" alt="{{ $product->title }}">
                                                                            </a>
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail detail-center " style="height:120px">
                                                                    <hr>
                                                                    <div class="detail-title">
                                                                        <div class="detail-left">
                                                                            <center>
                                                                                <p>{{ $product->title }}</p>
                                                                                <a href="">
                                                                                    <h6 class="price-title">
                                                                                        {{ $product->title }}
                                                                                    </h6>
                                                                                </a>
                                                                            </center>
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
                                                                                    &#8358; @convert($product->price)
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="icon-detail">
                                                                        <a href="{{ route('productview', ['slug' => $product->slug]) }}" title="Add to Wishlist">
                                                                            <i class="ti-bag" aria-hidden="true"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0)" title="Add to Wishlist">
                                                                            <i class="ti-heart" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($products->count() >= 13)
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->
@endsection