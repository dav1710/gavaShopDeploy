<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller
{
    private $basket;

    public function __construct() {
        $this->getBasket();
    }


    public function index(Request $request) {
        $products = $this->basket->products;
        return view('basket.index', compact('products'));
    }

    public function checkout() {
        return view('basket.checkout');
    }
    public function add(Request $request, $id) {
//        dd($request);
        $quantity = $request->input('quantity') ?? 1;
//        $shoes_size = $request->input('checked_shoes_size') ? $request->input('checked_shoes_size') : '';
//        $color = $request->input('color') ? $request->input('color') : '';
        $this->basket->increase($id, $quantity);
        // выполняем редирект обратно на ту страницу,
        // где была нажата кнопка «В корзину»
        return back();
    }

    public function plus(Request $request, $id) {
        $this->basket->increase($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus(Request $request, $id) {
        $this->basket->decrease($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Изменяет кол-во товара $product_id на величину $count
     */
    private function getBasket() {
        $basket_id = request()->cookie('basket_id');
        if (!empty($basket_id)) {
            try {
                $this->basket = Basket::findOrFail($basket_id);
            } catch (ModelNotFoundException $e) {
                $this->basket = Basket::create();
            }
        } else {
            $this->basket = Basket::create();
        }
        Cookie::queue('basket_id', $this->basket->id, 525600);
    }

    public function remove($id) {
        $this->basket->remove($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Полностью очищает содержимое корзины покупателя
     */
    public function clear() {
        $this->basket->delete();
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }
}
