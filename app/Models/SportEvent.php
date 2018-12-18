<?php

namespace App\Models;

use App\Models\BetradarModel;
use Betprophet\Betradar\Traits\HasLiveOdds;
use Betprophet\Betradar\Traits\HasRecovery;

class SportEvent extends BetradarModel
{
    use HasLiveOdds, HasRecovery;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'image',
        'sport_id',
        'tournament_id',
        'name',
        'venue_id',
        'scheduled',
        'start_time_tbd',
        'status',
        'next_live_time',
        'liveodds',
        'betradar_data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'betradar_data'  => 'array',
        'next_live_time' => 'datetime',
        'scheduled'      => 'datetime',
    ];

    /**
     * @var array
     */
    protected $statuses = [
        0 => 'not_started',
        1 => 'live',
        3 => 'ended',
        4 => 'closed',
    ];

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
     * Get tournament.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    /**
     * Get venue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * Get recoveries.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recoveries()
    {
        return $this->hasMany(Recovery::class, 'event_id');
    }

    /**
     * Get competitors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competitors()
    {
        return $this->hasMany(Competitor::class);
    }

    /**
     * Get event odds changes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oddsChanges()
    {
        return $this->hasMany(OddsChange::class, 'event_id');
    }

    /**
     * Get image attribute.
     *
     * @return string
     */
    public function getImageAttribute($image)
    {
        return $image ?? $this->tournament->image ?? $this->sport->image ?? null;
    }

    /**
     * Set status attribute.
     *
     * @param integer|string $status
     */
    public function setStatusAttribute($status)
    {
        if (is_numeric($status) && ($newStatus = array_get($this->statuses, $status))) {
            $status = $newStatus;
        }

        $this->attributes['status'] = $status;
    }
}
