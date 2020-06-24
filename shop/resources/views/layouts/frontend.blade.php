<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home Witter</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->
        <!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Poppins:400,700,600,500,300' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
		<!-- Font-Awesome css -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<!-- pe-icon-7-stroke css -->
        <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.css')}}">
		<!-- Flaticon css -->
        <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
		<!-- venobox css -->
        <link rel="stylesheet" href="{{asset('venobox/venobox.css')}}" type="text/css" media="screen" />
		<!-- nivo slider css -->
		<link rel="stylesheet" href="{{asset('lib/css/nivo-slider.css')}}" type="text/css" />
		<link rel="stylesheet" href="{{asset('lib/css/preview.css')}}" type="text/css" media="screen" />
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{asset('style.css')}}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
		<!-- modernizr css -->
		<script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
		<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    </head>
    <body>
        @php
         use Gloudemans\Shoppingcart\Facades\Cart;
		 use App\Category;

        @endphp
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!--Header Area Start-->

        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="header-logo">
                            <a href="{{asset('/')}}">
                                <img src="{{asset('img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-7 col-sm-12 hidden-xs">
                        <div class="mainmenu text-center">
                            <nav>
                                <ul id="nav">
                                    <li><a href="{{asset('/')}}">HOME</a></li>
                                    <li><a href="#">CATEGORY</a>
                                        <ul class="sub-menu">
                                            @foreach($allCategory as $cate)
                                                <li><a href="{{asset("category.html/$cate->id")}}">{{$cate->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
									                  <li><a href="{{asset("news.html")}}">NEWS</a>
									                  </li>
                                    <li><a href="{{asset('/about')}}">ABOUT</a></li>
									<li><a href="{{asset('/contact')}}">CONTACT</a></li>
									
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="header-right">
                            <ul>
                                <li>
                                    {{-- <a href="{{ route('login') }}"><i class="flaticon-people"></i></a> --}}

                                    @guest
                                        <li>
                                            <a href="{{ route('login') }}"><i class="flaticon-people"></i></a>
                                        </li>
                                        {{-- @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif --}}
                                    @else
                                        <li class="nav-item dropdown">
											
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
												</form>
												
											</div>

                                        </li>
                                    @endguest
                                </li>
                                <li class="shoping-cart">
                                    <a href="#">
                                        <i class="flaticon-shop"></i>
                                        <span>{{Cart::count()}}</span>
                                    </a>
                                    <div class="add-to-cart-product">
                                        @foreach (Cart::content() as $row)
                                            <div class="cart-product">
                                                <div class="cart-product-image">
                                                    <a href="single-product.html">
                                                        <img src="{{asset($row->cover)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="cart-product-info">
                                                    <p>
                                                        <span>{{$row->qty}}</span>
                                                        x
                                                        <a href="single-product.html">{{$row->name}}</a>
                                                    </p>
                                                    <span class="cart-price">{{$row->price}} Đ</span>
                                                </div>
                                                <div class="cart-product-remove">
                                                    {{-- <a href="" @php Cart::destroy() @endphp><i class="fa fa-times"></i></a> --}}
                                                 </div>
                                            </div>
                                        @endforeach

                                        <div class="total-cart-price">
                                            <div class="cart-product-line">
                                                <span>Tổng</span>
                                                <span class="total">{{Cart::subtotal()}}</span>
                                            </div>
                                        </div>
                                        <div class="cart-checkout">
                                            <a href="{{asset('order_detail')}}">
                                                Kiểm tra giỏ
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Area End-->


        @yield('content')
		<!-- Footer Area Start -->
		<footer>
		    <div class="footer-top-area">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-3 col-sm-8">
		                    <div class="footer-left">
		                        <a href="{{asset('/')}}">
		                            <img src="img/logo-2.png" alt="">
		                        </a>
		                        <p>Hệ thống nhà sách uy tín, chất lượng hàng đầu Việt Nam.</p>
		                        <ul class="footer-contact">
		                            <li>
		                                <i class="flaticon-location"></i>
		                                8 Tôn Thất Thuyết, Hà Nội. VN
		                            </li>
		                            <li>
		                                <i class="flaticon-technology"></i>
		                                (+84)0243 123 456
		                            </li>
		                            <li>
		                                <i class="flaticon-web"></i>
		                                writer@gmail.com
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-3 col-sm-4">
		                    <div class="single-footer">
		                        <h2 class="footer-title">Information</h2>
		                        <ul class="footer-list">
		                            <li><a href="{{asset('/about')}}">About Us</a></li>
		                            <li><a href="{{asset('/about/#van_chuyen')}}">Delivery Information</a></li>
		                            <li><a href="{{asset('/about/#chinh_sach')}}">Privacy & Policy</a></li>
		                            <li><a href="{{asset('/about/#thanh_toan')}}">Payment Methods</a></li>
		                            <li><a href="{{asset('/about/#hang_hoa')}}">Manufactures</a></li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="col-md-3 hidden-sm">
		                    <div class="single-footer">
		                        <h2 class="footer-title">My Account</h2>
		                        <ul class="footer-list">
		                            <li><a href="{{asset('profile')}}">My Account</a></li>
		                            <li><a href="{{route('login') }}">Login</a></li>
		                            <li><a href="{{asset('order/user/{id}')}}">Lịch sử mua hàng</a></li>
		                        </ul>
		                    </div>
		                </div>
		                {{-- <div class="col-md-2 hidden-sm">
		                    <div class="single-footer">
		                        <h2 class="footer-title">Shop</h2>
		                        <ul class="footer-list">
		                            <li><a href="#">Orders & Returns</a></li>
		                            <li><a href="#">Search Terms</a></li>
		                            <li><a href="#">Advance Search</a></li>
		                            <li><a href="#">Affiliates</a></li>
		                            <li><a href="#">Group Sales</a></li>
		                        </ul>
		                    </div>
		                </div> --}}
		                <div class="col-md-3 col-sm-8">
		                    <div class="single-footer footer-newsletter">
		                        <h2 class="footer-title">Our Newsletter</h2>
		                        <p>Hãy để lại cho chúng tôi Email của bạn để nhận được các thông tin mới nhất về sản phẩm của chúng tôi.</p>
		                        <form action="subscribe" method="post">
                                    @csrf
		                            <div>
		                                <input type="text" name="email" placeholder="email address">
		                            </div>
		                            <button class="btn btn-search btn-small" type="submit">SUBSCRIBE</button>
		                            <i class="flaticon-networking"></i>
		                        </form>
		                        {{-- <ul class="social-icon">
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-social"></i>
		                                </a>
		                            </li>
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-social-1"></i>
		                                </a>
		                            </li>
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-social-2"></i>
		                                </a>
		                            </li>
		                            <li>
		                                <a href="#">
		                                    <i class="flaticon-video"></i>
		                                </a>
		                            </li>
		                        </ul> --}}
		                    </div>
		                </div>
		                <div class="col-md-2 col-sm-4 visible-sm">
		                    <div class="single-footer">
		                        <h2 class="footer-title">Shop</h2>
		                        <ul class="footer-list">
		                            <li><a href="#">Orders & Returns</a></li>
		                            <li><a href="#">Search Terms</a></li>
		                            <li><a href="#">Advance Search</a></li>
		                            <li><a href="#">Affiliates</a></li>
		                            <li><a href="#">Group Sales</a></li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="footer-bottom">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-6">
                            <div class="footer-bottom-left pull-left">
                                <p>Copyright &copy; 2020 <span><a href="#">T2-T1904E</a></span>. All Right Reserved.</p>
                            </div>
		                </div>
		                <div class="col-md-6">
		                    <div class="footer-bottom-right pull-right">
		                        <img src="img/paypal.png" alt="">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</footer>
		<!-- Footer Area End -->

        <!--End of Quickview Product-->
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="{{asset('js/vendor/jquery-1.12.0.min.js')}}"></script>
		<!-- bootstrap js -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
		<!-- owl.carousel js -->
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<!-- jquery-ui js -->
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
		<!-- jquery Counterup js -->
        <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('js/waypoints.min.js')}}"></script>
		<!-- jquery countdown js -->
        <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
		<!-- jquery countdown js -->
        <script type="{{asset('text/javascript" src="venobox/venobox.min.js')}}"></script>
		<!-- jquery Meanmenu js -->
        <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
		<!-- wow js -->
        <script src="{{asset('js/wow.min.js')}}"></script>
		<script>
			new WOW().init();
		</script>
		<!-- scrollUp JS -->
        <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
		<!-- plugins js -->
        <script src="{{asset('js/plugins.js')}}"></script>
		<!-- Nivo slider js -->
		<script src="{{asset('lib/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
		<script src="{{asset('lib/home.js')}}" type="text/javascript"></script>
		<!-- main js -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>
