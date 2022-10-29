<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App\Models
 */
class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
      'slug',
      'title',
      'thumbnail',
    ];

    protected static function boot()
    {
        parent::boot();

        //todo 3rd lesson
        static::creating(function(Brand $brand) {
            $brand->slug = $brand->slug ?? str($brand->title)->slug();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

