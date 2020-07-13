@extends('layouts.home')

@section('content')
    <!--top brand panel start-->
<section class="brand-panel">
    <div class="brand-panel-box">
      <div class="brand-panel-contain ">
        <ul>
          <li><a href="#">top brand</a></li>
          <li><a>:</a></li>
          @foreach ($limitcats as $cat)
            <li><a href="{{ route('frontcategory', ['slug' => $cat->slug]) }}">{{ $cat->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  
  </section>
  <!--top brand panel end-->
  
  <!--slider start-->
  <section class="theme-slider b-g-white " id="theme-slider">
    <div class="custom-container">
      <div class="row">
        <div class="col">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/slider1.jpg') }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slider2.jpg') }}" alt="Second slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--slider end-->
  
  <!--discount banner start-->
  <section class="discount-banner">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="discount-banner-contain">
            <h2>Discount on every single item on our site.</h2>
            <h1><span>OMG! Just Look at the</span> <span>great Deals!</span></h1>
            <div class="rounded-contain rounded-inverse">
              <div class="rounded-subcontain">
                How does it feel, when you see great discount deals for each product?
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--discount banner end-->
  
  <!--tab product-->
  <section class="section-pt-space" >
    <div class="tab-product-main">
      <div class="tab-prodcut-contain">
        <ul class="tabs tab-title">
          <li class="current"><a href="tab-1">All Products</a></li>
          @foreach ($limitcats as $cat)
            <li class=""><a href="tabs-{{ $cat->id }}">{{ $cat->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>
  <!--tab product-->
  
  <!-- slider tab  -->
  <section class="section-py-space ratio_square product">
    <div class="custom-container">
      <div class="row">
        <div class="col pr-0">
          <div class="theme-tab product mb--5">
            <div class="tab-content-cls ">
              <div id="tab-1" class="tab-content active default">
                <div class="product-slide-6 product-m no-arrow">
                  @foreach ($randproducts as $product)
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
                          <div class="product-detail detail-inline " style="height:120px">
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
              
                  @foreach ($products as $pro)
                      
                  
                  <div id="tabs-{{ $pro->subcategory_id }}" class="tab-content">
                  <div class="product-slide-6 product-m no-arrow">
                    @foreach ($pro->subcategory->product as $product)
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
                            <div class="product-detail detail-inline" style="height:120px"> 
                              <div class="detail-title">
                                <div class="detail-left">
                                  <div class="rating-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <a href="">
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
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- slider tab end -->
  
<!--contact banner start-->
<section class="contact-banner contact-banner-inverse">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="contact-banner-contain">
          <h3>Great Deals For Our Best Products</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!--contact banner end-->
  
  <!--title start-->
  <div class="title1 section-my-space">
    <h4>Special Products</h4>
  </div>
  <!--title end-->
  
  <!--product start-->
  <section class="product section-pb-space mb--5">
    <div class="custom-container">
      <div class="row">
        <div class="col pr-0">
          <div class="product-slide-6 no-arrow">
            @foreach ($specials as $special)
              @if ($special->is_published == 1)
                <div>
                  <div class="product-box">
                    <div class="product-imgbox">
                      <div class="product-front" style="height:200px">
                        <a href="{{ route('productview', ['slug' => $special->slug]) }}">
                          <img src="{{ asset($special->image1) }}" style="max-width: 190px;max-height:190px;" alt="{{ $special->title }}">
                        </a>
                      </div>
                      <div class="product-icon icon-inline">
                        <a href="{{ route('productview', ['slug' => $special->slug]) }}" title="Add to Wishlist">
                          <i class="ti-bag" aria-hidden="true"></i>
                      </a>
                        <a href="javascript:void(0)" title="Add to Wishlist">
                          <i class="ti-heart" aria-hidden="true"></i>
                        </a>
                      </div>
                      <div class="new-label">
                        <div>new</div>
                      </div>
                      <div class="on-sale">
                        @if ($special->total_product == $special->products_limit)
                          on sale
                        @else
                          Out of stock
                        @endif
                      </div>
                    </div>
                    <div class="product-detail detail-inline " style="height:120px">
                      <div class="detail-title">
                        <div class="detail-left">
                          <div class="rating-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <a href="">
                            <h6 class="price-title">
                              {{ $special->title }}
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
  <!--product end-->
  
  <!--contact banner start-->
  <section class="contact-banner contact-banner-inverse">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="contact-banner-contain">
            <div class="contact-banner-img"><img src="images/layout-1/call-img.png" class="  img-fluid" alt="call-banner"></div>
            <div> <h3>if you have any question please call us</h3></div>
            <div><h2>123-456-7890</h2></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--contact banner end-->
@endsection