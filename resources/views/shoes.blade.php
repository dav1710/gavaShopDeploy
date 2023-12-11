@extends('layouts.main')
@section('main')
<div>
    <main style="border-top: 1px solid #ededed">
        <!--Start Shop Details Breadcrumb-->
        <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shop-details-inner">
                            <ul class="shop-details-menu">
                                <li><a href="/">Home</a></li>
                                <li class="active">{{ $shoes->title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Shop Details Breadcrumb-->
        <!--Start Shop Details Top-->
        <div class="shop-details-top">
            <div class="container">
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated ">
                        <div class="single-product-box two">
                            <div class="product-slicknav single-product-two-nav slider-nav">
                                @if (count($shoes->images)>0)
                                    @foreach ($shoes->images as $img)
                                        <div> <span class="single-item"> <img src="{{ asset('images/'.$img->image) }}" alt=""> </span> </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="big-product single-product-two slider-for">
                                    @if (count($shoes->images)>0)
                                        @foreach ($shoes->images as $img)
                                        <div>
                                            <div class="single-item">
                                                <img src="{{ asset('images/'.$img->image) }}" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                        <div class="shop-details-top-right two">
                            <div class="shop-details-top-right-content-box">
                                <div class="shop-details-top-title m-0">
                                    <h3>{{ $shoes->title }}</h3>
                                </div>
                                <div class="shop-details-top-price-box d-flex align-items-center flex-wrap ">
                                    <h3 class="pe-1">${{ $shoes->price }} </h3>
                                </div>
                                <div class="shop-details-top-color-sky-box">
                                    <h4>Color</h4>
                                    <ul class="varients">
                                        @foreach($colors as $color)
                                            @if(in_array($color->id,$color->selecteded))
                                                <li id="{{in_array($color->id,$color->selecteded) ? $color->id : ''}}" >
                                                    <input type="radio" class="color_id" name="color_id" value="{{$color->title}}"> <div style="background-color: {{'#'.$color->title}}; width: 20px; height: 20px; border-radius: 50%"></div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="shop-details-top-size-box">
                                    <h4>Size:</h4>
                                    <div class="shop-details-top-size-list-box">
                                        <ul class="shop-details-top-size-list">
                                            @foreach($shoes_sizes as $item)
                                                @if(in_array($item->id,$item->selecteded))
                                                    <li id="{{in_array($item->id,$item->selecteded) ? $item->id : ''}}" >
                                                        <input type="radio" class="shoes_size" name="shoes_size" value="{{$item->shoes_size}}">
                                                        <div style="width: 20px; height: 20px;"><p>{{$item->shoes_size}}</p></div>
                                                    </li>

                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-details-top-cart-box-btn mt-30">
                                    <form action="{{ route('basket.add', ['id' => $shoes->id]) }}"
                                          method="post" class="form-inline">
                                        @csrf
                                        <input type="hidden" name="quantity" class="card_value" id="input-quantity" value="1">
                                        <input type="hidden" name="checked_shoes_size" class="checked_shoes_size" value="">
                                        <input type="hidden" name="color" class="color" value="">
                                        <button class="addcart btn--primary style2 " type="submit">Add to Cart</button>
                                    </form>
                                </div>
                                <div class="shop-details-top-buy-now-btn"> <a href="cart.html" class="btn--primary disabled">Buy
                                        It Now</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Shop Details Top-->
        <!-- productdrescription-tabStart -->
        <section class="product pt-60 pb-120 wow fadeInUp overflow-hidden ">
            <div class="container ">
                <div class="row">
                    <div class="col-12 wow fadeInUp animated">
                        <ul class="nav product-details-nav nav-two nav-pills justify-content-center" id="pills-tab-two"
                            role="tablist">
                            <li class="nav-item" role="presentation"> <button class="nav-link active"
                                                                              id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description"
                                                                              type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                                    Description </button> </li>
                            <li class="nav-item" role="presentation"> <button class="nav-link" id="pills-sizechart-tab"
                                                                              data-bs-toggle="pill" data-bs-target="#pills-sizechart" type="button" role="tab"
                                                                              aria-controls="pills-sizechart" aria-selected="false"> Size Chart </button> </li>
                        </ul>
                    </div>
                </div>
                <div class="row wow fadeInUp animated">
                    <div class="tab-content" id="pills-tabContent-two">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                             aria-labelledby="pills-description-tab">
                            <div class="product-drescription">
                                <h4> Product Details:</h4>
                                <p> {{ $shoes->content }} </p>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-sizechart" role="tabpanel"
                             aria-labelledby="pills-sizechart-tab">
                            <div class="product-drescription">
                                <div class="size-chirt">
                                    <h4>Size Guide</h4>
                                    <p class="pt-0"> Assertively conceptualize parallel process improvements through
                                        user friendly colighue to action items. </p>
                                    <div class="size-tabble">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>Size</th>
                                                <th>XXS - XS</th>
                                                <th>XS - S</th>
                                                <th>S - M</th>
                                                <th>M - L</th>
                                                <th>L - XL</th>
                                                <th>XL - XXL</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>ARGENTINA</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                            </tr>
                                            <tr>
                                                <td>BOLIVIA</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>13</td>
                                            </tr>
                                            <tr>
                                                <td>COLOMBIA</td>
                                                <td>26</td>
                                                <td>28</td>
                                                <td>30</td>
                                                <td>32</td>
                                                <td>34</td>
                                                <td>36</td>
                                            </tr>
                                            <tr>
                                                <td>China</td>
                                                <td>34</td>
                                                <td>36</td>
                                                <td>38</td>
                                                <td>40</td>
                                                <td>42</td>
                                                <td>44</td>
                                            </tr>
                                            <tr>
                                                <td>MEXICO</td>
                                                <td>32</td>
                                                <td>34</td>
                                                <td>36</td>
                                                <td>38</td>
                                                <td>40</td>
                                                <td>42</td>
                                            </tr>
                                            <tr>
                                                <td>JAMAICA</td>
                                                <td>40</td>
                                                <td>42</td>
                                                <td>44</td>
                                                <td>46</td>
                                                <td>48</td>
                                                <td>50</td>
                                            </tr>
                                            <tr>
                                                <td>MEXICO</td>
                                                <td>32</td>
                                                <td>34</td>
                                                <td>36</td>
                                                <td>38</td>
                                                <td>40</td>
                                                <td>42</td>
                                            </tr>
                                            <tr>
                                                <td>Australia</td>
                                                <td>6</td>
                                                <td>8</td>
                                                <td>10</td>
                                                <td>12</td>
                                                <td>14</td>
                                                <td>16</td>
                                            </tr>
                                            <tr>
                                                <td>USA</td>
                                                <td>33</td>
                                                <td>44</td>
                                                <td>55</td>
                                                <td>66</td>
                                                <td>77</td>
                                                <td>88</td>
                                            </tr>
                                            <tr>
                                                <td>UK</td>
                                                <td>6</td>
                                                <td>8</td>
                                                <td>10</td>
                                                <td>12</td>
                                                <td>14</td>
                                                <td>16</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Pant</strong></td>
                                                <td>22-23 </td>
                                                <td>24-25</td>
                                                <td>26-27</td>
                                                <td>28-29</td>
                                                <td>30-31</td>
                                                <td>32-33</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection


