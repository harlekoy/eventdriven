<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'image',
        'name',
        'capacity',
        'city_name',
        'country_code',
        'map_coordinates',
    ];

    /**
     * Get country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'alpha_3');
    }
}
