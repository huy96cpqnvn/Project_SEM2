<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>BookShop</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
        <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{asset('assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

        <!-- SLEEK CSS -->
        <link id="sleek-css" rel="stylesheet" href="{{asset('assets/css/sleek.css')}}" />



        <!-- FAVICON -->
        <link href="{{asset('assets/img/favicon.png')}}" rel="shortcut icon" />

        <!--
          HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/plugins/nprogress/nprogress.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script src = "{{asset('admin/js/my_js.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    </head>


    <body class="sidebar-fixed sidebar-dark header-fixed header-light" id="body">
        <script>
            NProgress.configure({showSpinner: false});
            NProgress.start();
        </script>

        <div class="mobile-sticky-body-overlay"></div>

        <div class="wrapper">

            <!--
        ====================================
        ——— LEFT SIDEBAR WITH FOOTER
        =====================================
            -->
            <aside class="left-sidebar bg-sidebar">
                <div id="sidebar" class="sidebar sidebar-with-footer">
                    <!-- Aplication Brand -->
                    <div class="app-brand">
                        <a href="{{asset('/')}}">
                            <svg
                                class="brand-icon"
                                xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMidYMid"
                                width="30"
                                height="33"
                                viewBox="0 0 30 33"
                                >
                            <g fill="none" fill-rule="evenodd">
                            <path
                                class="logo-fill-blue"
                                fill="#7DBCFF"
                                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                                />
                            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                            </svg>
                            <span class="brand-name">Books Shop</span>
                        </a>
                    </div>
                    <!-- begin sidebar scrollbar -->
                    <div class="sidebar-scrollbar">

                        <!-- sidebar menu -->
                        <ul class="nav sidebar-inner" id="sidebar-menu">



                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                                   aria-expanded="false" aria-controls="dashboard">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span class="nav-text">Dashboard</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="dashboard"
                                     data-parent="#sidebar-menu">
                                    <div class="sub-menu">



                                        <li >
                                            <a class="sidenav-item-link" href="dashboard">
                                                <span class="nav-text">Ecommerce</span>

                                            </a>
                                        </li>






                                        <li >
                                            <a class="sidenav-item-link" href="analytics.html">
                                                <span class="nav-text">Analytics</span>

                                                <span class="badge badge-success">new</span>

                                            </a>
                                        </li>




                                    </div>
                                </ul>
                            </li>

                            <!-- User Management -->
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
                                   aria-expanded="false" aria-controls="user">
                                    <i class="mdi mdi-account-box"></i>
                                    <span class="nav-text">User Management</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="user"
                                     data-parent="#sidebar-menu">
                                    <div class="sub-menu">



                                        <li >
                                            <a class="sidenav-item-link" href="{{route('user_management.index')}}">
                                                <span class="nav-text">Users</span>

                                            </a>
                                        </li>






                                        <li >
                                            <a class="sidenav-item-link" href="mail_management">
                                                <span class="nav-text">Mails</span>


                                            </a>
                                        </li>




                                    </div>
                                </ul>
                            </li>

                            <!-- End User Management -->


                            <!-- Product Management -->

                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#product"
                                   aria-expanded="false" aria-controls="product">
                                    <i class="mdi mdi-shopify"></i>
                                    <span class="nav-text">Products Management</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="product"
                                     data-parent="#sidebar-menu">
                                    <div class="sub-menu">



                                        <li >
                                            <a class="sidenav-item-link" href="cate_management">
                                                <span class="nav-text">Category</span>

                                            </a>
                                        </li>






                                        <li >
                                            <a class="sidenav-item-link" href="product_management">
                                                <span class="nav-text">Product</span>

                                            </a>
                                        </li>



                                        <li >
                                            <a class="sidenav-item-link" href="proDetail_management">
                                                <span class="nav-text">Product Details</span>

                                            </a>
                                        </li>

                                        <li >
                                            <a class="sidenav-item-link" href="author_management">
                                                <span class="nav-text">Author</span>

                                            </a>
                                        </li>

                                        <li >
                                            <a class="sidenav-item-link" href="language_management">
                                                <span class="nav-text">Language</span>

                                            </a>
                                        </li>

                                        <li >
                                            <a class="sidenav-item-link" href="pub_management">
                                                <span class="nav-text">Publisher</span>

                                            </a>
                                        </li>

                                        <li >
                                            <a class="sidenav-item-link" href="prf_management">
                                                <span class="nav-text">PriceFilter</span>

                                            </a>
                                        </li>

                                        <li >
                                            <a class="sidenav-item-link" href="dis_management">
                                                <span class="nav-text">Discount</span>

                                            </a>
                                        </li>

                                    </div>
                                </ul>
                            </li>

                            <!-- End Product -->


                            <!-- News Management -->

                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#news"
                                   aria-expanded="false" aria-controls="news">
                                    <i class="mdi mdi-book-open-page-variant"></i>
                                    <span class="nav-text">News Management</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="news"
                                     data-parent="#sidebar-menu">
                                    <div class="sub-menu">



                                        <li >
                                            <a class="sidenav-item-link" href="newscate_management">
                                                <span class="nav-text">Category</span>

                                            </a>
                                        </li>






                                        <li >
                                            <a class="sidenav-item-link" href="tag_management">
                                                <span class="nav-text">Tags</span>

                                            </a>
                                        </li>

                                        <li >
                                            <a class="sidenav-item-link" href="news_management">
                                                <span class="nav-text">News</span>

                                            </a>
                                        </li>



                                    </div>
                                </ul>
                            </li>

                            <!-- End News -->


                            <!-- Orders Management -->

                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#orders"
                                   aria-expanded="false" aria-controls="orders">
                                    <i class="mdi mdi-shopping"></i>
                                    <span class="nav-text">Orders Management</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="orders"
                                     data-parent="#sidebar-menu">
                                    <div class="sub-menu">



                                        <li >
                                            <a class="sidenav-item-link" href="order">
                                                <span class="nav-text">Orders</span>

                                            </a>
                                        </li>






                                        <li >
                                            <a class="sidenav-item-link" href="{{route('order_detail.index')}}">
                                                <span class="nav-text">OrderDetails</span>

                                            </a>
                                        </li>

                                    </div>
                                </ul>
                            </li>

                            <!-- End Orders -->


                        </ul>

                    </div>

                    <hr class="separator" />


                </div>
            </aside>



            <div class="page-wrapper">
                <!-- Header -->
                <header class="main-header " id="header">
                    <nav class="navbar navbar-static-top navbar-expand-lg">
                        <!-- Sidebar toggle button -->
                        <button id="sidebar-toggler" class="sidebar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                        <!-- search form -->
                        <div class="search-form d-none d-lg-inline-block">
                            <div class="input-group">
                                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc."
                                       autofocus autocomplete="off" />
                            </div>
                            <div id="search-results-container">
                                <ul id="search-results"></ul>
                            </div>
                        </div>

                        <div class="navbar-right ">
                            <ul class="nav navbar-nav">
                                <!-- Github Link Button -->
                                <li class="github-link mr-3">
                                <a href="{{route('order_detail.index')}}" title="Giỏ Hàng Ban Có {{Cart::count()}} Mặt Hàng "><i class="fa fa-cart-plus"></i></a>


                                </li>
                                <!-- User Account -->
                                <li class="dropdown user-menu">
                                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                        <img src="{{asset('assets/img/user/user.png')}}" class="user-image" alt="User Image" />
                                        <span class="d-none d-lg-inline-block">{{ Auth::user()['name']}}</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <!-- User image -->
                                        <li class="dropdown-header">
                                            <img src="{{asset('assets/img/user/user.png')}}" class="img-circle" alt="User Image" />
                                            <div class="d-inline-block">
                                                {{ Auth::user()['name'] }} <small class="pt-1">{{ Auth::user()['email'] }}</small>
                                            </div>
                                        </li>

                                        <li>
                                            <a href="profile.html">
                                                <i class="mdi mdi-account"></i> My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="mdi mdi-email"></i> Message
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                                        </li>

                                        <li class="dropdown-footer">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        </div>
                    </nav>


                </header>


                @yield('content')

                <footer class="footer mt-auto">
                    <div class="copyright bg-white">
                        <p>
                            &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                            <a
                                class="text-primary"
                                href="http://www.iamabdus.com/"
                                target="_blank"
                                >Abdus</a
                            >.
                        </p>
                    </div>
                    <script>
                        var d = new Date();
                        var year = d.getFullYear();
                        document.getElementById("copy-year").innerHTML = year;
                    </script>
                </footer>

            </div>
        </div>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
        <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/plugins/toaster/toastr.min.js')}}"></script>
        <script src="{{asset('assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/plugins/charts/Chart.min.js')}}"></script>
        <script src="{{asset('assets/plugins/ladda/spin.min.js')}}"></script>
        <script src="{{asset('assets/plugins/ladda/ladda.min.js')}}"></script>
        <script src="{{asset('assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
        <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
        <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
        <script src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('assets/plugins/jekyll-search.min.js')}}"></script>
        <script src="{{asset('assets/js/sleek.js')}}"></script>
        <script src="{{asset('assets/js/chart.js')}}"></script>
        <script src="{{asset('assets/js/date-range.js')}}"></script>
        <script src="{{asset('assets/js/map.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>



    </body>
</html>

