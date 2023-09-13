<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoesSize extends Model
{
    protected $guarded = false;
    protected $appends = ['selecteded'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'shoes_size_products');
    }

    public function getSelectededAttribute()
    {
        return $this->product()->pluck('shoes_size_id')->toArray();
    }
}
