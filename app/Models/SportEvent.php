<?php

namespace App\Models;

use App\Models\BetradarModel;

class SportEvent extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'tournament_id',
        'scheduled',
        'start_time_tbd',
        'status',
        'betradar_data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'scheduled'     => 'datetime',
        'betradar_data' => 'array',
    ];
}
