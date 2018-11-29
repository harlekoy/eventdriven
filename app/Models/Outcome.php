<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'betradar_id',
        'market_id',
        'odds',
        'probabilities',
        'active',
    ];

    /**
     * Get outcome market.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
