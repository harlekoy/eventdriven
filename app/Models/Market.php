<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'odds_change_id',
        'betradar_id',
        'status',
        'specifiers',
    ];

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
     * Get odds change.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oddsChange()
    {
        return $this->belongsTo(OddsChange::class);
    }

    /**
     * Get outcomes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outcomes()
    {
        return $this->hasMany(Outcome::class);
    }
}
