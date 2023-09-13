<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $latest_shoes = Product::latest()->get();
        $basket_id = $request->cookie('basket_id');
        $products = Basket::findOrFail($basket_id)->products;

        return view('home', compact('latest_shoes', 'products'));
    }
    public function contact()
    {
        return view('contact', compact('latest_shoes'));
    }
}
