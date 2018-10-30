<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportEvent extends Model
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
        'betradar_data' => 'array',
    ];
}
