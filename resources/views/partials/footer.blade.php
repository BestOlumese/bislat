<!--footer start-->
<footer class="footer-2">
    <div class="container ">
      <div class="row">
        <div class="col-12">
          <div class="footer-main-contian">
            <div class="row ">
              <div class="col-lg-4 col-md-12 ">
                <div class="footer-left">
                  <div class="footer-logo">
                    <img src="{{ asset('images/layout-2/logo/logo.png') }}" class="img-fluid  " alt="logo">
                  </div>
                  <div class="footer-detail">
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                    <ul class="paymant-bottom">
                      <li><a href="#"><img src="{{ asset('images/layout-1/pay/1.png') }}" class="img-fluid" alt="pay"></a></li>
                      <li><a href="#"><img src="{{ asset('images/layout-1/pay/2.png') }}" class="img-fluid" alt="pay"></a></li>
                      <li><a href="#"><img src="{{ asset('images/layout-1/pay/3.png') }}" class="img-fluid" alt="pay"></a></li>
                      <li><a href="#"><img src="{{ asset('images/layout-1/pay/4.png') }}" class="img-fluid" alt="pay"></a></li>
                      <li><a href="#"><img src="{{ asset('images/layout-1/pay/5.png') }}" class="img-fluid" alt="pay"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-12 ">
                <div class="footer-right">
                  <div class="row">
                    <div class="col-md-12">
                      <div class=account-right>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="footer-box">
                              <div class="footer-title">
                                <h5>my account</h5>
                              </div>
                              <div class="footer-contant">
                                <ul>
                                  <li><a href="{{ route('about') }}">about us</a></li>
                                  <li><a href="{{ route('contact') }}">contact us</a></li>
                                  @if (Auth::guard('customer')->check())
                                    <li><a href="{{ route('customer.dashboard') }}">my account</a></li>
                                    <li><a href="{{ route('customer.logout') }}">logout</a></li>
                                  @else
                                    <li><a href="{{ route('customer.login') }}">my account</a></li>
                                    <li><a href="{{ route('customer.login') }}">login</a></li>
                                    <li><a href="{{ route('customer.register') }}">register</a></li>
                                  @endif
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="footer-box">
                              <div class="footer-title">
                                <h5>categories</h5>
                              </div>
                              <div class="footer-contant">
                                <ul>
                                  @foreach ($subrand as $sub)
                                    <li><a href="{{ route('frontcategory', ['slug'=>$sub->slug]) }}">{{ $sub->name }}</a></li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="footer-box footer-contact-box">
                              <div class="footer-title">
                                <h5>contact us</h5>
                              </div>
                              <div class="footer-contant">
                                <ul class="contact-list">
                                  <li><i class="fa fa-map-marker"></i><span>big deal store demo store <br> <span> india-3654123</span></span></li>
                                  <li><i class="fa fa-phone"></i><span>call us: 123-456-7898</span></li>
                                  <li><i class="fa fa-envelope-o"></i><span>email us: support@bigdeal.com</span></li>
                                  <li><i class="fa fa-fax"></i><span>fax 123456</span></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="app-link-block  bg-transparent">
      <div class="container">
        <div class="row">
          <div class="app-link-bloc-contain app-link-bloc-contain-1">
            <div class="app-item-group ">
              <div class="sosiyal-block" >
                <h6>follow us on </h6>
                <ul class="sosiyal">
                  <li><a href="#"><i class="fa fa-facebook" ></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" ></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" ></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram" ></i></a></li>
                  <li><a href="#"><i class="fa fa-rss" ></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="sub-footer-contain">
              <p><span>2020 </span> &copy; copy right by Bitslat</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--footer end-->
  
  
  <!-- tap to top -->
  <div class="tap-top">
    <div>
      <i class="fa fa-angle-double-up"></i>
    </div>
  </div>
  <!-- tap to top End -->
  
  <!-- Add to cart bar -->
  <div id="cart_side" class=" add_to_cart top">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my cart</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeCart()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        <ul class="cart_product">
          @foreach (Cart::content() as $basket)
            <li>
              <div class="media">
                <a href="#">
                  <img alt="" class="mr-3" src="{{ asset($basket->model->image1) }}">
                </a>
                <div class="media-body">
                  <a href="#">
                    <h4>{{ substr($basket->name, 0, 10) }}...</h4>
                  </a>
                  <h4>
                    <span>{{ $basket->qty }} x &#8358; {{ $basket->total() }}</span>
                  </h4>
                </div>
              </div>
              <div class="close-circle">
                <a href="{{ route('cart.delete', ['id' => $basket->rowId ]) }}">
                  <i class="ti-trash" aria-hidden="true"></i>
                </a>
              </div>
            </li>
          @endforeach
        </ul>
        <ul class="cart_total">
          <li>
            <div class="total">
              <h5>subtotal : <span>&#8358; {{ Cart::total() }}</span></h5>
            </div>
          </li>
          <li>
            <div class="buttons">
              <a href="{{ route('cart') }}" class="btn btn-normal btn-xs view-cart">view cart</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Add to cart bar end-->
  
  <!--Newsletter modal popup start-->
  {{-- <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="news-latter">
            <div class="modal-bg">
              <div class="offer-content">
                <div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h2>newsletter</h2>
                  <p>Subscribe to our website mailling list <br> and get a Offer, Just for you!</p>
                  <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                    <div class="form-group mx-sm-3">
                      <input type="email" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                      <button type="submit" class="btn btn-theme btn-normal btn-sm " id="mc-submit">subscribe</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!--Newsletter Modal popup end--> 
  
  <!-- My account bar start-->
  <div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my account</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeAccount()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <form class="theme-form">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" placeholder="Email" required="">
        </div>
        <div class="form-group">
          <label for="review">Password</label>
          <input type="password" class="form-control" id="review" placeholder="Enter your password" required="">
        </div>
        <div class="form-group">
          <a href="#" class="btn btn-rounded btn-block ">Login</a>
        </div>
        <div>
          <h5 class="forget-class"><a href="forget-pwd.html" class="d-block">forget password?</a></h5>
          <h6 class="forget-class"><a href="register.html" class="d-block">new to store? Signup now</a></h6>
        </div>
      </form>
    </div>
  </div>
  <!-- Add to account bar end-->
  
  <!-- Add to wishlist bar -->
  <!-- <div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my wishlist</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeWishlist()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        <ul class="cart_product">
          {{-- @foreach ($results as $result)
            <li>
              <div class="media">
                <a href="#">
                  <img alt="" class="mr-3" src="{{ asset($result->image1) }}">
                </a>
                <div class="media-body">
                  <a href="#">
                    <h4>{{ $result->name }}</h4>
                  </a>
                  <h4>
                    <span>@convert($result->price)</span>
                  </h4>
                </div>
              </div>
              <div class="close-circle">
                <a href="{{ route('wishlist.delete') }}">
                  <i class="ti-trash" aria-hidden="true"></i>
                </a>
              </div>
            </li>
          @endforeach --}}
        </ul>
        <ul class="cart_total">
          <li>
            <div class="buttons">
              <a href="{{ route('wishlist') }}" class="btn btn-normal btn-block  view-cart">view wislist</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div> -->
  <!-- Add to wishlist bar end-->
  
  <!-- add to  setting bar  start-->
  <div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my setting</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeSetting()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="setting-block">
        <div >
          <h5>language</h5>
          <ul>
            <li><a href="#">english</a></li>
            <li><a href="#">french</a></li>
          </ul>
          <h5>currency</h5>
          <ul>
            <li><a href="#">uro</a></li>
            <li><a href="#">rupees</a></li>
            <li><a href="#">pound</a></li>
            <li><a href="#">doller</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- facebook chat section end -->