<?php

namespace App\Providers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $basket_id = request()->cookie('basket_id') ?? '';
        View::share('products', Basket::find($basket_id)->products ?? (array)null);
        View::share('latest_shoes', Product::latest()->get());
        View::share('categories', Category::all());
    }
}
