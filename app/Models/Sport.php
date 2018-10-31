<?php

namespace App\Models;

use App\Traits\SportHasTournaments;

class Sport extends BetradarModel
{
    use SportHasTournaments;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];
}
