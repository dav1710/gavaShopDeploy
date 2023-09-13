<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = false;
    protected $appends = ['selecteded'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }
    public function getSelectededAttribute()
    {
        return $this->product()->pluck('tag_id')->toArray();
    }
}
