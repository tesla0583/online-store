<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'brand_id',
        'price',
        'thumbnail'
    ];

    protected static function boot()
    {
        parent::boot();

        //todo 3rd lesson
        static::creating(function(Product $product) {
            $product->slug = $product->slug ?? str($product->title)->slug();
        });
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
