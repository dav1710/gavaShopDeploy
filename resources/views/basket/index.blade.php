@extends('layouts.main')
@section('main')
<div class="basket">
@if (count($products))
    @php
        $basketCost = 0;
    @endphp


        @if(session('error'))
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
<section class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Cart</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="/"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<section class="cart-area pt-30 pb-120">
    <div class="container">
        <div class="row wow fadeInUp animated">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="cart-table-box">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th class="">Product Name</th>
                                    <th class="price">Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th class="hide-me"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @php
                                    $itemPrice = $product->price;
                                    $itemQuantity =  $product->pivot->quantity;
                                    $itemCost = $itemPrice * $itemQuantity;
                                    $basketCost = $basketCost + $itemCost;
                                    // dd($itemPrice,$itemQuantity,$itemCost,$basketCost);
                                @endphp

                            {{ Log::info($itemPrice) }}
                            {{ Log::info($itemQuantity) }}
                            {{ Log::info($itemCost) }}
                            {{ Log::info($basketCost) }}
                                <tr>
                                    <td>
                                        <div class="thumb-box">
                                                <img src="{{ asset('cover/'.$product->cover) }}" style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px" alt="{{ $product->cover }}">
                                                <h5> {{ $product->title }} </h5>
                                        </div>
                                    </td>
                                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                                    <td class="qty">
                                        <div class="qtySelector text-center">
                                            <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="decreaseQty">
                                                    <i class="flaticon-minus"></i>
                                                </button>
                                            </form>
                                            <input type="number" class="qtyValue" value="{{ $itemQuantity }}" />
                                            <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="increaseQty">
                                                    <i class="flaticon-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="sub-total">{{ number_format($itemCost, 2, '.', '') }}</td>
                                    <td>
                                        <div class="remove">
                                            <form action="{{ route('basket.remove', ['id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                    <i class="flaticon-cross"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <form class="float-right" action="{{route('checkout')}}" method="POST">
            @csrf
            @method('POST')
            <button class="btn--primary mt-30" type="submit">Checkout</button>
        </form>
    </div>
</section>
@else
<h4>Empty Cart</h4>
@endif

</div>
@endsection
