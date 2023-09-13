<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title', 'description', 'content', 'price', 'count', 'cover', 'is_published', 'category_id'
    ];
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
    public function categories()
    {
        return $this->hasOne(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function shoes_size()
    {
        return $this->belongsToMany(ShoesSizeProduct::class, 'shoes_size_products', 'product_id', 'shoes_size_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
