<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title For This Document -->
    <title> Gava </title>
    <!-- Favicon For This Document -->
    <link rel="shortcut icon" href="{{ asset('main/assets/images/logo/favicon-32x32.png" type="image/x-icon') }}">
    <!-- Bootstrap 5 Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/bootstrap.5.1.1.min.css') }}">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- FlatIcon Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('font_awesome/all.min.css') }}"  crossorigin="anonymous" referrerpolicy="no-referrer" >

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/plugin/slick.css') }}">
    <!--  Ui Tabs Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/plugin/jquery-ui.min.css') }}">
    <!-- Magnific-popup Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/plugin/magnific-popup.css') }}">
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/plugin/nice-select.v1.0.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/plugin/animate.css') }}">
    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/style.css') }}">

</head>

<body class="shoe">
    <!-- ==========Preloader========== -->
    {{-- <div class="loader"><span>Gava...</span></div> --}}
    <!-- ==========Preloader========== -->
    <!--===scroll bottom to top===-->
    <a href="#0" class="scrollToTop"><i class="flaticon-up-arrow"></i></a>
    <!--===scroll bottom to top===-->

    <!-- header-default start -->
    <header class="header-style-3">
        <!-- Start Desktop Menu -->
        <div class="menubox">
            <div class="container-fluid">
                <div class="row d-lg-none d-block">
                    <div class="mobile-menu ">
                        <div class="mobile-menu__menu-top border-bottom-0">
                            <div class="container">
                                <div class="row">
                                    <div class="menu-info d-flex justify-content-between align-items-center">
                                        <div class="menubar"> <span></span> <span></span> <span></span> </div> <a
                                            href="index.html" class="logo"> <img src="assets/images/logo/logo.png"
                                                alt=""> </a>
                                        <div class="cart-holder">
                                            <a href="#0" class="cart cart-icon position-relative">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-closer"></div>
                        <div class="mobile-menu__sidebar-menu">
                            <div class="menu-closer two"> <span> Close Menu</span> <span class="cross"><i
                                        class="flaticon-cross"></i></span> </div>
                            <div class="search-box-holder">
                                <form action="#0">
                                    <div class="form-group search-box menu"> <input type="text" class="form-control"
                                            placeholder="Search for products"> <span class="search-icon"> <i
                                                class="flaticon-magnifying-glass"></i> </span> </div>
                                </form>
                            </div>
                            <ul class="page-dropdown-menu">
                                <li> <a href="/">Home</a>
                                </li>
                                <li> <a href="/">Shop</a>
                                </li>
                                <li><a href="contact.html">Contact </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-lg-block d-none">
                    <div class="row g-0 position-relative">
                        <div class="col-lg-3 d-flex align-items-center justify-content-center border-rit ">
                            <div class="logo"> <a href="index.html"> <img src="assets/images/logo/logo.png" alt=""> </a>
                            </div>
                        </div>
                        <div class="col-lg-9 g-0 p-0">
                            <div class="row g-0 holder">
                                <div class="col-12">
                                    <div class="some-info">
                                        <p class="d-flex align-items-center"> <span class="icon"> <i
                                                    class="flaticon-power"></i> </span> Welcome to Gava Online Shop</p>
                                        <div class="right d-flex align-items-center ">
                                            <a href="/"> Sign In / Register </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-one"> </div>
                            <div class="row g-0 holder">
                                <div class="col-12">
                                    <div class="mega-menu-default mega-menu d-lg-block d-none">
                                        <div class=" d-flex align-items-center justify-content-between ">
                                            <nav>
                                                <ul
                                                    class="page-dropdown-menu d-flex align-items-center justify-content-center">
                                                    <li class="dropdown-list"> <a href="/">Home</a>
                                                    </li>
                                                    <li class="dropdown-list"> <a href="/">Shop</a>
                                                    </li>
                                                    <li class="dropdown-list"> <a href="{{ route('contact') }}">Contact</a> </li>
                                                </ul>
                                            </nav>
                                            @foreach($products as $product)
                                            @php
                                                $itemQuantity =  $product->pivot->quantity;
                                            @endphp
                                            @endforeach

                                            <div class="right d-flex align-items-center justify-content-end">
                                                <ul class="main-menu__widge-box d-flex align-items-center ">
                                                    <li class="cartm"> <a href="{{ route('basket.index') }}" class="number cart-icon"> <i
                                                                class="flaticon-shopping-cart"></i><span
                                                                class="count">({{ isset($itemQuantity) ?  $itemQuantity : 0}})</span></a> </li>
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




        <div class="sticy-header">
            <div class="mobile-menu d-lg-none d-block">
                <div class="mobile-menu__menu-top border-bottom-0">
                    <div class="container">
                        <div class="row">
                            <div class="menu-info d-flex justify-content-between align-items-center">
                                <div class="menubar"> <span></span> <span></span> <span></span> </div> <a
                                    href="index.html" class="logo"> <img src="assets/images/logo/logo.png" alt=""> </a>
                                <div class="cart-holder">
                                    <a href="#0" class="cart cart-icon position-relative">
                                        <i class="flaticon-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container position-relative d-lg-block d-none">
                <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo me-2">
                        <img src="assets/images/logo/logo.png" alt=""> </a>
                    <div class="mega-menu-default mega-menu d-lg-block d-none">
                        <div class="container ">
                            <div class="row">
                                <nav>
                                    <ul
                                        class="page-dropdown-menu d-flex align-items-center justify-content-center">
                                        <li class="dropdown-list"> <a href="/">Home</a>
                                        </li>
                                        <li class="dropdown-list"> <a href="/">Shop</a>
                                        </li>
                                        <li class="dropdown-list"> <a href="contact.html">Contact</a> </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <main class="overflow-hidden">
        @yield('main')
    </main>

    <!--  Footer Three start -->
    <footer class="footer-default footer-style-1">
        <div class="footer-default__shap_1 position-absolute "> <img src="assets/images/shape/footer-shape-1.png"
                alt=""> </div>
        <!--Start Footer-->
        <div class="footer-default__main-footer position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                        <div class="footer-default__single-box">
                            <div class="company-info">
                                <div class="footer-title">
                                    <h4> Office</h4>
                                </div>
                                <div class="text1">
                                    <p>29 Holles Place, Dublin 2 D02 YY46</p>
                                </div>
                                <div class="text2">
                                    <p>68 Jay Street, Suite 902 New Side <br> Brooklyn, NY 11201</p>
                                </div>
                                <div class="text3">
                                    <p>New York, United States</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                        <div class="footer-default__single-box">
                            <div class="footer-title">
                                <h4> Information </h4>
                            </div>
                            <ul class="footer-links">
                                <li><a href="about-us.html">About us</a></li>
                                <li><a href="contact.html">Contact Us </a></li>
                                <li><a href="faq.html">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                        <div class="footer-default__single-box">
                            <div class="footer-newsletter">
                                <div class="newsletter-bottom d-flex align-items-center">
                                    <div class="footer__medio-boxx flex-column medio-boxx  d-flex align-items-center">
                                        <div class="footer-title-box">
                                            <p>Follow Us:</p>
                                        </div>
                                        <ul>
                                            <li><a href="https://www.facebook.com/" target="_blank" class="active"><i
                                                        class="flaticon-facebook-app-symbol"></i></a></li>
                                            <li><a href="https://www.youtube.com/" target="_blank"><i
                                                        class="flaticon-youtube"></i></a></li>
                                            <li><a href="https://twitter.com/"><i class="flaticon-twitter"
                                                        target="_blank"></i></a></li>
                                            <li><a href="https://www.instagram.com/"><i class="flaticon-instagram"
                                                        target="_blank"></i></a></li>
                                        </ul>
                                        <ul class="footer-payment wow fadeInUp animated">
                                            <a href="#0"> <img src="{{ asset('main/assets/images/home-four/method-1.jpg') }}" alt="payment"> </a>
                                            <a href="#0"> <img src="{{ asset('main/assets/images/home-four/method-2.jpg') }}" alt="payment"> </a>
                                            <a href="#0"> <img src="{{ asset('main/assets/images/home-four/method-3.jpg') }}" alt="payment"> </a>
                                            <a href="#0"> <img src="{{ asset('main/assets/images/home-four/method-4.jpg') }}" alt="payment"> </a>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- footer-bottom Footer-->
        <div class="footer_bottom position-relative">
            <div class="container">
                <div class="footer_bottom_content">
                    <div class="copyright wow fadeInUp animated">
                        <p>© 2023 <a href="/">Gava.</a> All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--==== Js Scripts Start ====-->
    <!-- Jquery v3.6.0 Js -->
    <script src="{{ asset('main/assets/js/jqurey.v3.6.0.min.js') }}"></script> <!-- Popper v2.9.3 Js -->
    <script src="{{ asset('main/assets/js/popper.v2.9.3.min.js') }}"></script> <!-- Bootstrap v5.1.1 js -->
    <script src="{{ asset('main/assets/js/bootstrap.v5.1.1.min.js') }}"></script> <!-- jquery ui js -->
    <script src="{{ asset('main/assets/js/plugin/jquery-ui.min.js') }}"></script> <!-- Parallax js -->
    <script src="{{ asset('main/assets/js/plugin/jarallax.min.js') }}"></script> <!-- Isotope js -->
    <script src="{{ asset('main/assets/js/plugin/isotope.js') }}"></script> <!-- Slick Slider Js -->
    <script src="{{ asset('main/assets/js/plugin/slick.min.js') }}"></script> <!-- magnific-popup v2.3.4 Js -->
    <script src="{{ asset('main/assets/js/plugin/jquery.magnific-popup.min.js') }}"></script> <!-- Tweenmax v2.3.4 Js -->
    <script src="{{ asset('main/assets/js/plugin/tweenMax.min.js') }}"></script> <!-- Nice Select Js -->
    <script src="{{ asset('font_awesome/all.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/plugin/nice-select.v1.0.min.js') }}"></script> <!-- Wow js -->
    <script src="{{ asset('main/assets/js/plugin/wow.v1.3.0.min.js') }}"></script> <!-- Wow js -->
    <script src="{{ asset('main/assets/js/plugin/jquery.countdown.min.js') }}"></script> <!-- Main js -->
    <script src="{{ asset('main/assets/js/main.js') }}"></script>
    <!--==== Js Scripts End ====-->
</body>

</html>
