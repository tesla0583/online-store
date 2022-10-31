<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App\Models
 */
class Brand extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
      'slug',
      'title',
      'thumbnail',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

