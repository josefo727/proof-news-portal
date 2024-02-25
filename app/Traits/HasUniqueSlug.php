<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUniqueSlug
{
    public static function bootHasUniqueSlug()
    {
        static::creating(function ($model) {
            $model->assignSlug($model);
        });

        static::updating(function ($model) {
            $model->assignSlug($model);
        });
    }

    public function assignSlug(&$model)
    {
        // Uses either a property defined in the model for the slug or a default value
        $propertyToSlugify = $model->slugSource ?? 'name';
        $model->slug = Str::slug($model->{$propertyToSlugify});

        $latestSlug =
            static::whereRaw("slug = '{$model->slug}' OR slug LIKE '{$model->slug}-%'")
                ->latest('id')
                ->value('slug');

        if ($latestSlug) {
            $pieces = explode('-', $latestSlug);
            $number = intval(end($pieces));
            $model->slug .= '-'.($number + 1);
        }
    }
}
