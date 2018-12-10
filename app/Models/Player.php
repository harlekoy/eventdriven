<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sport_id',
        'name',
        'full_name',
        'type',
        'date_of_birth',
        'nationality',
        'country_code',
        'height',
        'weight',
        'jersey_number',
        'gender',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'betradar_data' => 'array',
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

    /**
     * Get sport.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * Get all wagers placed.
     */
    public function wagers()
    {
        return $this->morphMany(Wager::class, 'wagerable');
    }
}
