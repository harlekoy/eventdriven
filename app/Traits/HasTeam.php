<?php

namespace App\Traits;

use App\Models\Team;

trait HasTeam
{
    /**
     * Boot Has team.
     */
    protected static function bootHasTeam()
    {
        static::created(function ($model) {
            $team = Team::firstOrNew([
                'abbreviation' => $model->abbreviation,
                'sport_id'     => $model->sport->id
            ]);

            $team->fill(
                array_only($model->toArray(), $model->getFillable())
            )->save();
        });
    }
}
