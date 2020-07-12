@extends('layouts.home')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>product</h2>
                        <ul>
                            <li><a href="{{ route('index') }}">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="{{ route('frontcategory', ['slug'=>$product->subcategory->slug]) }}">{{ $product->subcategory->name }}</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="">{{ $product->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product-slick no-arrow">
                        <div style="border: 1px solid #ddd;padding:50px;border-radius:4px"><center><img src="{{ asset($product->image1) }}" alt="" style="max-width:331px;max-height:395px;vertical-align:middle;"></center></div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                <div><img src="/images/product-sidebar/001.jpg" alt="" class="img-fluid  image_zoom_cls-0"></div>
                                <div><img src="/images/product-sidebar/002.jpg" alt="" class="img-fluid  image_zoom_cls-1"></div>
                                <div><img src="/images/product-sidebar/003.jpg" alt="" class="img-fluid  image_zoom_cls-2"></div>
                                <div><img src="/images/product-sidebar/004.jpg" alt="" class="img-fluid  image_zoom_cls-3"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-7 rtl-text">
                    <div class="product-right">
                        <h2>{{ $product->title }}</h2>
                        @if ($product->label == 'gift')
                            <h4>
                                <del>&#8358; @convert($product->price)</del><span>@php
                                    $r = (($product->price - $product->price_discount) / $product->price) * 100;
                                    echo round($r);
                                    
                                @endphp% off</span>
                            </h4>
                            <h3>&#8358; @convert($product->price_discount)</h3>
                        @else
                            <h3>&#8358; @convert($product->price)</h3>
                        @endif
                        <form action="{{ route('cart.add') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="product-description border-product">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="qty" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                        <input type="hidden" name="pdt_id" value="{{ $product->id }}">
                                </div>
                            </div>
                            <div class="product-buttons">
                                <button type="submit" class="btn btn-normal">Add To Cart</button>
                            </div>
                        </form>
                        @if (Auth::guard('customer')->check())
                            <div class="border-product">
                                <div class="product-icon">
                                    <form action="{{ route('wishlist.add') }}" class="d-inline-block" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="pdt_id" value="{{ $product->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::guard('customer')->user()->id }}">
                                        <button type="submit" class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add To WishList</span></button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="border-product ">
                        </div>
                    </div>
                </div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f0b7719cd2bd12e"></script>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- product-tab starts -->
<section class=" tab-product  tab-exes ">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 ">
               <div class=" creative-card creative-inner">
                   <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                       <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                           <div class="material-border"></div>
                       </li>
                   </ul>
                   <div class="tab-content nav-material" id="top-tabContent">
                       <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                           <p>{!! $product->details !!}</p>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->

<!-- related products -->
<section class="section-big-py-space  ratio_asos bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 product">
                <div class="product-slide no-arrow">
                    @foreach ($products as $product)
                        @if ($product->is_published == 1)
                            <div>
                            <div class="product-box">
                                <div class="product-imgbox">
                                <div class="product-front" style="height:200px">
                                    <a href="{{ route('productview', ['slug' => $product->slug]) }}">
                                    <img src="{{ asset($product->image1) }}" style="max-width: 190px;max-height:190px;" alt="{{ $product->title }}">
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
                                <div class="product-detail detail-inline ">
                                <div class="detail-title">
                                    <div class="detail-left">
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#">
                                        <h6 class="price-title">
                                        {{ $product->title }}
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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- related products --> 
@endsection