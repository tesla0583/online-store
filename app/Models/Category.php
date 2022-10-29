<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    protected static function boot()
    {
        parent::boot();

        //todo 3rd lesson
        static::creating(function(Category $category) {
            $category->slug = $category->slug ?? str($category->title)->slug();
        });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
