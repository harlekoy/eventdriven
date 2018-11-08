<?php

namespace App\Traits;

use App\Jobs\CurrentSportEvents;

trait TournamentHasSportEvents
{
    /**
     * Boot tournament has sport events.
     */
    protected static function bootTournamentHasSportEvents()
    {
        static::updated(function ($model) {
            if (array_get($model->getDirty(), 'enable')) {
                dispatch(new CurrentSportEvents($model));
            }
        });
    }
}
