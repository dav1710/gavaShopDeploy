<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // public function index(Request $request)
    // {
    //     $latest_shoes = Product::latest()->get();
    //     $basket_id = $request->cookie('basket_id');
    //     $products = Basket::findOrFail($basket_id)->products;

    //     return view('home', compact('latest_shoes', 'products'));
    // }
    // public function contact()
    // {
    //     return view('contact', compact('latest_shoes'));
    // }
    public function index(Request $request)
    {
        return view('home');
    }
    public function contact()
    {
        return view('contact');
    }
    public function shop()
    {
        return view('shop');
    }
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        header('Content-Type: application/json');
        $basket_id = request()->cookie('basket_id');
        $products = $basket_id ? Basket::find($basket_id)->products : (array)null;
        $lineItems = [];
        $totalPrice = 0;
        $itemQuantity = 0;
        $basketCost = 0;
        foreach ($products as $product){
            $itemPrice = $product->price;
            $itemQuantity =  $product->pivot->quantity;
            $itemCost = $itemPrice * $itemQuantity;
            $basketCost = $basketCost + $itemCost;
            $totalPrice += $product->price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->title,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->pivot->quantity,
            ];
        }

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true),
            'cancel_url' => route('checkout.cancel', [], true),
            'automatic_tax' => [
                'enabled' => true,
            ],
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $basketCost;
        $order->session_id = $checkout_session->id;
        $order->save();

        return redirect($checkout_session->url);

    }
    public function success()
    {
        $basket_id = request()->cookie('basket_id');
        $products = Basket::findOrFail($basket_id);
        $products->delete();
        return redirect()->route('home');
    }

    public function cancel()
    {
        return redirect()->back()->withErrors(['name' => 'The name is required']);
    }
}
