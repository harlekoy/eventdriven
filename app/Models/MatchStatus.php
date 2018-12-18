<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchStatus extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_id',
        'description',
        'period_number',
    ];
}
