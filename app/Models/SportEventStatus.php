<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportEventStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'odds_change_id',
        'status',
        'reporting',
        'home_score',
        'away_score',
        'match_status',
    ];

    /**
     * Get odds change.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oddsChange()
    {
        return $this->belongsTo(OddsChange::class);
    }

    /**
     * Get sport event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(SportEvent::class, 'event_id');
    }

    /**
     * Get match status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matchStatus()
    {
        return $this->belongsTo(MatchStatus::class, 'match_status');
    }
}
