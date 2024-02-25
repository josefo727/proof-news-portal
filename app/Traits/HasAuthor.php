<?php

namespace App\Traits;

use App\Models\User;

trait HasAuthor
{
    public static function bootHasAuthor()
    {
        static::creating(function ($model) {
            $model->author_id = auth()->id() ?? User::query()->inRandomOrder()->first()->id;
        });
    }
}
