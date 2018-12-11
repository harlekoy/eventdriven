<?php

namespace App\Models;

use App\Models\SportEvent;
use Illuminate\Database\Eloquent\Model;

class Wager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sport_event_id',
        'wagerable_id',
        'wagerable_type',
        'bet_type',
        'total_wager_value',
        'odds',
        'selling_percentage',
        'selling_price',
        'status',
    ];

    /**
     * Get sport event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sportEvent()
    {
        return $this->belongsTo(SportEvent::class);
    }

    /**
     * Get
     * @return [type] [description]
     */
    public function wagerable()
    {
        return $this->morphTo();
    }
}
