<?php

use App\Http\Controllers\{AdminController, BasketController, CategoryController, ColorController, HomeController, MainController, TagController, ShoesSizeController, UserController, ProductController};
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/migrate', function() {
    Artisan::call("migrate");
    return 'migrated';
});
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::get('/basket/index', [BasketController::class , 'index'])->name('basket.index');
Route::get('/basket/checkout', [BasketController::class , 'checkout'])->name('basket.checkout');
Route::post('/basket/add/{id}', [BasketController::class , 'add'])
    ->where('id', '[0-9]+')
    ->name('basket.add');
Route::post('/basket/plus/{id}', [BasketController::class , 'plus'])
    ->where('id', '[0-9]+')
    ->name('basket.plus');
Route::post('/basket/minus/{id}', [BasketController::class , 'minus'])
    ->where('id', '[0-9]+')
    ->name('basket.minus');
Route::post('/basket/remove/{id}', [BasketController::class , 'remove'])
    ->where('id', '[0-9]+')
    ->name('basket.remove');
Route::post('/basket/clear', [BasketController::class , 'clear'])->name('basket.clear');
Route::post('/checkout', [MainController::class , 'checkout'])->name('checkout');
Route::get('/checkout-success', [MainController::class , 'success'])->name('checkout.success');
Route::get('/checkout-cancel', [MainController::class , 'cancel'])->name('checkout.cancel');


Route::get('shoes/{id}', [ProductController::class, 'showItem'])->name('shoes');
Route::get('product/{id}', [CategoryController::class, 'showProductsCategory'])->name('category_product');

Route::middleware('auth')->group(function () {
Route::get('/admin', AdminController::class);
Route::group(['prefix'=>'admin'], function(){
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('shoes', ShoesSizeController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::post('products/deletecover/{id}', [ProductController::class, 'deletecover'])->name('products.deletecover');
    Route::post('products/deleteimage/{id}', [ProductController::class, 'deleteimage'])->name('products.deleteimage');
    Route::post('categories/deleteimage/{id}', [CategoryController::class, 'deletecover'])->name('categories.deletecover');
});

});

// Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
