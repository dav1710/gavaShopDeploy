@extends('layouts.main')
@section('main')
<div>
    <main style="border-top: 1px solid #ededed">
        <section class="product-grid pt-60 pb-120">
            <div class="container">
{{--                <div class="row d-none">--}}
{{--                    <div class="col-xl-12">--}}
{{--                        <div class="shop-grid-page-top-info justify-content-md-between justify-content-center">--}}
{{--                            <div--}}
{{--                                class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">--}}
{{--                                <div class="short-by">--}}
{{--                                    <div class="select-box">--}}
{{--                                        <select class="wide" name="order_by">--}}
{{--                                            <option value="0"><a href="{{ route('sortFeatured') }}">Featured </a></option>--}}
{{--                                            <option value="2"><a href="{{ route('sortAZ') }}">Alphabetically, A-Z</a></option>--}}
{{--                                            <option value="3"><a href="{{ route('sortZA') }}">Alphabetically, Z-A</a></option>--}}
{{--                                            <option value="4"><a href="{{ route('sortLow') }}">Price, low to high</a></option>--}}
{{--                                            <option value="5"><a href="{{ route('sortHigh') }}">Price, high to low</a></option>--}}
{{--                                            <option value="6"><a href="{{ route('sortOld') }}">Date, old to new</a></option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                    <div class="row">

                        @foreach($latest_shoes as $item)
                            <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                            <div class="products-three-single w-100 wow fadeInUp animated mt-30">
                            <div class="products-three-single-img">
                                <a href="{{ route('shoes', ['id' => $item->id]) }}" class="d-block">
                                    <img src="{{ asset('cover/'.$item->cover) }}" class="first-img" alt="" />
                                    <img src="{{ asset('cover/'.$item->cover) }}" alt="" class="hover-img" />
                                </a>
                            <form action="{{ route('basket.add', ['id' => $item->id]) }}"
                                  method="post" class="form-inline">
                                @csrf
                                <input type="hidden" name="quantity" id="input-quantity" value="1">
                                <button type="submit" class="addcart btn--primary style2"> Add To Cart </button>
                            </form>
                            </div>
                            <div class="products-three-single-content text-center"> <span>{{ $item->title }}</span>
                                <h5><a href="{{ route('shoes', ['id' => $item->id]) }}"> {{ $item->description }} </a></h5>
                                <p>{{ $item->price }}$</p>
                            </div>
                            </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </section>
    </main>
</div>
@endsection


