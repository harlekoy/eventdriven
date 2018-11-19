<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'api_url',
        'active',
        'scope',
        'stateful_recovery_window_in_minutes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'betradar_data' => 'array',
        'active'        => 'boolean',
    ];
}
