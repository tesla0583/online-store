<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 29.10.2022
 * Time: 23:58
 */

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    //Todo: dz (change append time, search slug in db when find add new increment prop from trait)
    protected static function bootHasSlug()
    {
        static::creating(function(Model $item) {
            $item->slug = $item->slug
                ?? str($item->{self::slugFrom()})
                    ->append(time())
                    ->slug();
        });
    }

    public static function slugFrom()
    {
        return 'title';
    }
}