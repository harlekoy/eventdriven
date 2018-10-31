<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;

trait SportHasCategories
{
    /**
     * Boot sport has categories.
     */
    protected static function bootSportHasCategories()
    {
        static::updated(function ($model) {
            if (array_get($model->getDirty(), 'enable')) {
                Artisan::call('betradar:categories', [
                    '--sport' => $model->id,
                ]);
            }
        });
    }
}
