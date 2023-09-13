@extends('layouts.main')
@section('main')
    <!-- Start Main Slider -->
    <section class="banner-style-3 overflow-hidden">
        <!-- Banner Carousel -->
        <div class="banner-slide3 slick" data-slick='{"dots": true, "infinite": true, "speed": 600, "slidesToShow": 1,
            "slidesToScroll": 1, "arrows": false, "autoplay": true, "autoplaySpeed": 6000,
             "fade": false, "pauseOnHover": false}'>

            <!-- Slide -->
            <div class="slide">
                <div class="contant-box position-relative">

                    <img class="bg-img hundread-vh" src="{{ asset('main/assets/images/home-three/home-3-bg.jpg') }}" alt="image">

                    <div class="content-holder p-0 absolute-content">
                        <div class="container  w-100 h-100">
                            <div class="row align-items-center justify-content-start w-100 h-100">
                                <div class="col-xl-6 col-md-9" style="backdrop-filter: blur(15px); padding: 25px; border-radius: 50px;">
                                    <div class="content-common home3c slideup position-relative">
                                        <h6 class="new wow animated fadeInUp">NEW COLLECTION</h6>
                                        <h1 class="wow animated fadeInUp" data-wow-delay="0.4s">
                                            Run anywhere <br> comfort everywhere.
                                        </h1>
                                        <p class="text wow animated fadeInUp">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vehicula
                                            faucibus massa est elit maecenas.
                                        </p>
                                        <a href="shop-grid.html"
                                            class="btn--primary button style2 wow animated fadeInUp">Shop
                                            Collection</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide -->
            <div class="slide">
                <div class="contant-box position-relative">


                    <img class="bg-img hundread-vh" src="{{ asset('main/assets/images/home-three/home-3-bg_1.jpg') }}" alt="image">


                    <div class="content-holder p-0 absolute-content">
                        <div class="container w-100 h-100">
                            <div class="row align-items-center justify-content-end w-100 h-100">
                                <div class="col-xl-6 col-md-9" style="backdrop-filter: blur(15px); padding: 25px; border-radius: 50px;">
                                    <div class="content-common slidedown home3c position-relative text-center">
                                        <h6 class="new wow animated fadeInUp">NEW COLLECTION</h6>
                                        <h1 class="wow animated fadeInUp" data-wow-delay="0.4s">
                                            Run anywhere <br> comfort everywhere.
                                        </h1>
                                        <p class="text wow animated fadeInUp ms-auto me-auto">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vehicula
                                            faucibus massa est elit maecenas.
                                        </p>
                                        <a href="shop-grid.html"
                                            class="btn--primary button style2 wow animated fadeInUp">Shop
                                            Collection</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main Slider -->

    <!--Start Products Six-->
    <section class="products-three pt-60 pb-60 overflow-hidden">
        <div class="auto-container container">
            <div class="section-header style3 text-center wow fadeInUp animated">
                <h2>Latest Shoes </h2>
                <p> Weekend Top Brands </p>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="products-three__inner">
                        <ul>
                            @foreach ($latest_shoes as $item)
                            <li class="products-three-single wow fadeInUp animated">
                                <div class="products-three-single-img">
                                    <a href="shop-details-3.html" class="d-block"> <img
                                            src="{{ asset('cover/'.$item->cover) }}" class="first-img"
                                            alt="" /> <img src="{{ asset('cover/'.$item->cover) }}"
                                            alt="" class="hover-img" /></a>
                                    <div class="products-grid-one__badge-box"> <span
                                            class="bg_base badge new ">New</span> </div>
                                            <form action="{{ route('basket.add', ['id' => $item->id]) }}"
                                                method="post" class="form-inline">
                                                @csrf
                                                <input type="hidden" name="quantity" id="input-quantity" value="1">
                                                <button type="submit" class="addcart btn--primary style2"> Add To Cart </button>
                                            </form>
                                </div>
                                <div class="products-three-single-content text-center"> <span>{{ $item->title }}</span>
                                    <h5><a href="shop-details-3.html"> {{ $item->description }} </a></h5>
                                    <p>{{ $item->price }}$</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Products Six-->

    <!--Start Categories Two-->
    <section class="categories-three overflow-hidden">
        <div class="auto-container container">
            <div class="row">
                <div class="categories-three__inner pt-120 pb-120">
                    <div class="row align-items-center justify-content-xl-start justify-content-center">
                        <div class="col-xl-4 col-md-7">
                            <div class="categories-three__content text-xl-start text-center wow fadeInUp animated">
                                <div class="sec-title-style2 style3">
                                    <h2>Shop by Categories</h2>
                                </div>
                                <p>Continually enhance long-term don high impact niche markets whereas user centric
                                    niche markets. actualize backward compatible...</p>
                                <div class="btn-box"> <a href="shop-grid-left-sidebar.html"
                                        class="btn--primary style2">Discover More</a> </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="row  justify-content-center">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                                        <div class="categories-three__list-item-inner"> <a
                                                href="shop-grid-right-sidebar.html" class="img-box"> <img
                                                    src="{{ asset('main/assets/images/home-three/categories-v2-img1.jpg') }}" alt="" />
                                                <div class="text"> <span>369 Items</span> </div>
                                            </a>
                                            <div class="title text-center">
                                                <h4><a href="shop-grid-left-sidebar.html">Sport’s Shoes</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                                        <div class="categories-three__list-item-inner"> <a
                                                href="shop-grid-left-sidebar.html" class="img-box"> <img
                                                    src="{{ asset('main/assets/images/home-three/categories-v2-img2.jpg') }}" alt="" />
                                                <div class="text"> <span>369 Items</span> </div>
                                            </a>
                                            <div class="title text-center">
                                                <h4><a href="shop-grid-left-sidebar.html">Casual Shoes</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                                        <div class="categories-three__list-item-inner"> <a
                                                href="shop-grid-left-sidebar.html" class="img-box"> <img
                                                    src="{{ asset('main/assets/images/home-three/categories-v2-img3.jpg') }}" alt="" />
                                                <div class="text"> <span>369 Items</span> </div>
                                            </a>
                                            <div class="title text-center">
                                                <h4><a href="shop-grid-left-sidebar.html">Office Shoes</a></h4>
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
    </section>
    <!--End Categories Two-->

    <!-- core-features Start -->
    <section class="core-features pt-120 mb-60 overflow-hidden">
        <div class="container auto-container">
            <div class="row mt--30">
                <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.2s">
                    <div class="core-features__box d-flex ms-0"> <span class="one"></span> <span class="two"></span>
                        <div class="icon"> <img src="assets/images/icon/f-icon-1.png" alt=""> </div>
                        <div class="core-features__box-content"> <a href="login.html" class="d-block">
                                <h4> Secure Payment </h4>
                            </a>
                            <p>Everybody different which the why give offer styles for every body.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.3s">
                    <div class="core-features__box d-flex "> <span class="one"></span> <span class="two"></span>
                        <div class="icon"> <img src="assets/images/icon/f-icon-2.png" alt=""> </div>
                        <div class="core-features__box-content"> <a href="login.html" class="d-block">
                                <h4> 27/7 Fast Delivery </h4>
                            </a>
                            <p>Everybody different which the why give offer styles for every body.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.4s">
                    <div class="core-features__box d-flex "> <span class="one"></span> <span class="two"></span>
                        <div class="icon"> <img src="assets/images/icon/f-icon-3.png" alt=""> </div>
                        <div class="core-features__box-content"> <a href="login.html" class="d-block">
                                <h4> Return & Refund </h4>
                            </a>
                            <p>Everybody different which the why give offer styles for every body.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.5s">
                    <div class="core-features__box d-flex me-0"> <span class="one"></span> <span class="two"></span>
                        <div class="icon"> <img src="assets/images/icon/f-icon-4.png" alt=""> </div>
                        <div class="core-features__box-content"> <a href="login.html" class="d-block">
                                <h4> Quality Support </h4>
                            </a>
                            <p>Everybody different which the why give offer styles for every body.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
