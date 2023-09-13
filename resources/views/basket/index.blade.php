@extends('layouts.main')
@section('main')
<div class="basket" style="height: 100vh">
@if (count($products))
    @php
        $basketCost = 0;
    @endphp
<section class="cart-area pt-120 pb-120">
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
                                @endphp
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
        <div class="row pt-120">
            <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                <div class="cart-total-box">
                    <div class="inner-title">
                        <h3>Cart Totals</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt--30">
            <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                <div class="cart-total-box mt-30">
                    <div class="table-outer">
                        <table class="cart-table2">
                            <thead class="cart-header clearfix">
                                <tr>
                                    <th colspan="1" class="shipping-title">Shipping</th>
                                    <th class="price">$2500.00</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="shipping"> Shipping </td>
                                    <td class="selact-box1">
                                        <ul class="shop-select-option-box-1">
                                            <li> <input type="checkbox" name="free_shipping" id="option_1"
                                                    checked=""> <label for="option_1"><span></span>Free
                                                    Shipping</label> </li>
                                            <li> <input type="checkbox" name="flat_rate" id="option_2"> <label
                                                    for="option_2"><span></span>Flat Rate</label> </li>
                                            <li> <input type="checkbox" name="local_pickup" id="option_3">
                                                <label for="option_3"><span></span>Local Pickup</label> </li>
                                        </ul>
                                        <div class="inner-text">
                                            <p>Shipping options will be updated during checkout</p>
                                        </div>
                                        <h4>Calculate Shipping</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="total">Total</h4>
                                    </td>
                                    <td class="subtotal">$2500.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                <div class="cart-check-out mt-30">
                    <h3>Check Out</h3>
                    <ul class="cart-check-out-list">
                        <li>
                            <div class="left">
                                <p>Subtotal</p>
                            </div>
                            <div class="right">
                                <p>$2500.00</p>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <p>Shipping</p>
                            </div>
                            <div class="right">
                                <p><span>Flat rate:</span> $50.00</p>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <p>Total Price:</p>
                            </div>
                            <div class="right">
                                <p>$2550.00</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<h4>Empty Cart</h4>
@endif

</div>
@endsection
