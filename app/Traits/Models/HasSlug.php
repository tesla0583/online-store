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
    protected static function bootHasSlug()
    {
        static::creating(function(Model $item) {
            $item->makeSlug();
        });
    }

    protected function makeSlug()
    {
        if(!$this->{$this->slugColumn()}) {
            $slug = $this->slugUnique(
                str($this->{$this->slugFrom()})
                    ->slug()
                    ->value()
            );
        }

        $this->{$this->slugColumn()} = $slug;
    }

    protected function slugColumn()
    {
        return 'slug';
    }

    protected function slugFrom()
    {
        return 'title';
    }

    private function slugUnique($slug)
    {
        $originalSlug = $slug;
        $i = 0;

        while ($this->isSlugExists($slug)) {
            $i++;

            $slug = $originalSlug. '-'. $i;
        }

        return $slug;
    }

    private function isSlugExists($slug)
    {
        $query = $this->newQuery()
            ->where(self::slugColumn(), $slug)
            ->where($this->getKeyName(), '!=', $this->getKey())
            ->withoutGlobalScopes();

        return $query->exists();
    }
}