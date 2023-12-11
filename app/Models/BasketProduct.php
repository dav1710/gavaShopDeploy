<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    protected $table = 'basket_product';
    protected $fillable = [
        'basket_id', 'product_id', 'quantity', 'shoes_size', 'color_id'
    ];
}
