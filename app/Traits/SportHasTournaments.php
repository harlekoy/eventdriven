<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;

trait SportHasTournaments
{
    /**
     * Boot sport has tournaments.
     */
    protected static function bootSportHasTournaments()
    {
        static::updated(function ($model) {
            if (array_get($model->getDirty(), 'enable')) {
                Artisan::call('betradar:tournaments', [
                    '--sport' => $model->id,
                ]);
            }
        });
    }
}
