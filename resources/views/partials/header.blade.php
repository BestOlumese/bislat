<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
      <div class="custom-container">
        <div class="row">
          <div class="col-xl-5 col-md-7 col-sm-6">
            <div class="top-header-left">
              <div class="shpping-order">
                <h6>free shipping on order over $99 </h6>
              </div>
              <div class="app-link">
                <h6>
                  Download aap
                </h6>
                <ul>
                  <li><a><i class="fa fa-apple" ></i></a></li>
                  <li><a><i class="fa fa-android" ></i></a></li>
                  <li><a><i class="fa fa-windows" ></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-md-5 col-sm-6">
            <div class="top-header-right">
              <div class="top-menu-block">
                <ul>
                  <li><a href="#">gift cards</a></li>
                  <li><a href="#">Notifications</a></li>
                  <li><a href="#">help & contact</a></li>
                  <li><a href="#">todays deal</a></li>
                  <li><a href="#">track order</a></li>
                  <li><a href="#">shipping </a></li>
                  <li><a href="#">easy returns</a></li>
                </ul>
              </div>
              <div class="language-block">
                <div class="language-dropdown">
                    <span  class="language-dropdown-click">
                      english <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                  <ul class="language-dropdown-open">
                    <li><a href="#">hindi</a></li>
                    <li><a href="#">english</a></li>
                    <li><a href="#">marathi</a></li>
                    <li><a href="#">spanish</a></li>
                  </ul>
                </div>
                <div class="curroncy-dropdown">
                    <span class="curroncy-dropdown-click">
                      usd<i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                  <ul class="curroncy-dropdown-open">
                    <li><a href="#"><i class="fa fa-inr"></i>inr</a></li>
                    <li><a href="#"><i class="fa fa-usd"></i>usd</a></li>
                    <li><a href="#"><i class="fa fa-eur"></i>eur</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="layout-header2">
      <div class="container">
        <div class="col-md-12">
          <div class="main-menu-block">
            <div class="sm-nav-block">
              <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
              <ul class="nav-slide">
                <li>
                  <div class="nav-sm-back">
                    back <i class="fa fa-angle-right pl-2"></i>
                  </div>
                </li>
                @foreach ($allsubcategories as $allsubcategory)
                    <li> <img src="{{ asset('images/favicon/favicon.ico') }}" alt="{{ $allsubcategory->title }}"> <a href="{{ route('frontcategory', ['slug' => $allsubcategory->slug]) }}">{{ $allsubcategory->name }}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="logo-block">
              <a href="{{ route('index') }}"><img src="{{ asset('images/layout-2/logo/logo.png') }}" class="img-fluid  " alt="logo"></a>
            </div>
            <div class="input-block">
              <div class="input-box">
                <form method="GET" action="/results" class="big-deal-form">
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="search"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" name="query" placeholder="Search a Product" >
                    <div class="input-group-prepend">
                      <button type="submit" class="btn btn-normal">SEARCH</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="cart-block cart-hover-div " onclick="openCart()">
              <div class="cart ">
                <span class="cart-product">{{ Cart::content()->count() }}</span>
                <ul>
                  <li class="mobile-cart  ">
                    <a href="#">
                      <i class="icon-shopping-cart "></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="cart-item">
                <h5>shopping</h5>
                <h5>cart</h5>
              </div>
            </div>
                    
            <div class="menu-nav">
                <span class="toggle-nav">
                  <i class="fa fa-bars "></i>
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="category-header-2">
      <div class="custom-container">
        <div class="row">
          <div class="col">
            <div class="navbar-menu">
              <div class="category-left">
                <div class="nav-block">
                  <div class="nav-left" >
                    <nav class="navbar" data-toggle="collapse" data-target="#navbarToggleExternalContent">
                      <button class="navbar-toggler" type="button">
                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                      </button>
                      <h5 class="mb-0 text-white title-font">Shop by category</h5>
                    </nav>
                    <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                      <ul class="nav-cat title-font">
                        @foreach ($subcategories as $subcategory)
                          <li> <img src="{{ asset('images/favicon/favicon.ico') }}" alt="{{ $subcategory->title }}"> <a href="{{ route('frontcategory', ['slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                        @endforeach
                        <li>
                          <ul class="mor-slide-open">
                            @foreach ($moresubcategories as $moresubcategory)
                              <li> <img src="{{ asset('images/favicon/favicon.ico') }}" alt="{{ $subcategory->title }}"> <a href="{{ route('frontcategory', ['slug' => $moresubcategory->slug]) }}">{{ $moresubcategory->name }}</a></li>
                            @endforeach
                          </ul>
                        </li>
                        <li>
                          <a class="mor-slide-click">more category <i class="fa fa-angle-down pro-down"></i><i class="fa fa-angle-up pro-up"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="menu-block">
                  <nav id="main-nav">
                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                      <li>
                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                      </li>
                      <!--HOME-->
                      <li>
                        <a href="{{ route('index') }}" class="dark-menu-item">Home</a>
                      </li>
                      <!--HOME-END-->
  
                      <!--SHOP-->
                      <li class="mega"><a href="#" class="dark-menu-item">products
                      </a>
                        <ul class="mega-menu full-mega-menu ">
                            <li>
                              <div class="container">
                                <div class="row">
                                  
                                  @foreach ($categories as $category)
                                  <div class="col mega-box">
                                    <div class="link-section">
                                      <div class="menu-title">
                                        <h5>{{ $category->name }}</h5>
                                      </div>
                                      <div class="menu-content">
                                        <ul>
                                            @foreach ($category->subcategory as $subcategory)
                                                <li><a href="{{ route('frontcategory', ['slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                      </div><br>
                                    </div>
                                  </div>
                                  @endforeach
                                </div>
                                <div class="row menu-banner">
                                  <div class="col-lg-6">
                                    <div>
                                      <img src="{{ asset('images/megaindomie.jpg') }}" alt="menu-banner" class="img-fluid">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div>
                                      <img src="{{ asset('images/megabanner.png') }}" alt="menu-banner" class="img-fluid">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                      </li>
                      <!--SHOP-END-->

                      @if (Auth::guard('customer')->check())
                        <!--ABOUT-->
                          <li>
                            <a href="{{ route('customer.dashboard') }}" class="dark-menu-item">My Account</a>
                          </li>
                        <!--ABOUT-END-->
                      @endif
                      
                      <!--ABOUT-->
                      <li>
                        <a href="{{ route('about') }}" class="dark-menu-item">About Us</a>
                      </li>
                      <!--ABOUT-END-->

                      <!--CONTACT-->
                      <li>
                        <a href="{{ route('contact') }}" class="dark-menu-item">Contact Us</a>
                      </li>
                      <!--CONTACT-END-->

                      @if (Auth::guard('customer')->check())
                          <!--CONTACT-->
                            <li>
                              <a href="{{ route('customer.logout') }}" 
                                class="dark-menu-item"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <!--CONTACT-END-->

                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      @else
                        <!--CONTACT-->
                        <li>
                          <a href="{{ route('customer.login') }}" class="dark-menu-item">Login</a>
                        </li>
                        <!--CONTACT-END-->

                        <!--CONTACT-->
                        <li>
                          <a href="{{ route('customer.register') }}" class="dark-menu-item">Register</a>
                        </li>
                        <!--CONTACT-END-->
                      @endif
                    </ul>
                  </nav>
                </div>
                <div class="icon-block">
                  <ul>
                    @if (Auth::guard('customer')->check())
                      <li class="mobile-user onhover-dropdown">
                        <a href="{{ route('customer.dashboard') }}"><i class="icon-user"></i>
                        </a>
                      </li>
                    @else
                      <li class="mobile-user onhover-dropdown">
                        <a href="{{ route('customer.login') }}"><i class="icon-user"></i>
                        </a>
                      </li>
                    @endif
                    <li class="mobile-wishlist">
                      <a href="{{ route('wishlist') }}"><i class="icon-heart"></i><div class="cart-item"><div>@if(Auth::guard('customer')->check()) {{ Wishlist::count(Auth::guard('customer')->user()->id) }} @else 0 @endif item<span>wishlist</span></div></div></a></li>
                    <li class="mobile-search"><a href="#"><i class="icon-search"></i></a>
                      <div class ="search-overlay">
                        <div>
                          <span class="close-mobile-search">×</span>
                          <div class="overlay-content">
                            <div class="container">
                              <div class="row">
                                <div class="col-xl-12">
                                  <form method="GET" action="/results">
                                    <div class="form-group"><input type="text" class="form-control" id="exampleInputPassword1" name="query" placeholder="Search a Product"></div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="mobile-setting mobile-setting-hover" onclick="openSetting()"><a href="#"><i class="icon-settings"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>