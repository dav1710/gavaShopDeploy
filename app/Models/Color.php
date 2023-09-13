<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = false;
    protected $appends = ['selecteded'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'color_products');
    }
    public function getSelectededAttribute()
    {
        return $this->product()->pluck('color_id')->toArray();
    }
}
