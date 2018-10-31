<?php

namespace App\Models;

use App\Traits\SportHasCategories;

class Sport extends BetradarModel
{
    use SportHasCategories;

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
