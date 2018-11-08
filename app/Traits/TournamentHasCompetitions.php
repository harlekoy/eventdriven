<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;

trait TournamentHasCompetitions
{
    /**
     * Boot tournament has competitions.
     */
    protected static function bootTournamentHasCompetitions()
    {
        static::updated(function ($model) {
            if (array_get($model->getDirty(), 'enable')) {
                Artisan::call('betradar:competitors', [
                    '--tournament' => $model->id,
                ]);
            }
        });
    }
}
