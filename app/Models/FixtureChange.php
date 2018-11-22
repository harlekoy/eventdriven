<?php

namespace App\Models;

use App\Models\SportEvent;
use Carbon\Carbon;

class FixtureChange extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time',
        'next_live_time',
        'product',
        'event_id',
        'timestamp',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_time'     => 'datetime',
        'next_live_time' => 'datetime',
        'timestamp'      => 'datetime',
    ];

    /**
     * Get producer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producer()
    {
        return $this->belongsTo(Producer::class, 'product');
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
     * Format date.
     *
     * @param string $value
     * @return \Carbon\Carbon
     */
    public function formatDate($value)
    {
        $value = substr($value, 0, 10);

        return Carbon::createFromTimestamp($value);
    }

    /**
     * Set start time attribute.
     *
     * @param string $value
     */
    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $this->formatDate($value);
    }

    /**
     * Set next live time attribute.
     *
     * @param string $value
     */
    public function setNextLiveTimeAttribute($value)
    {
        $this->attributes['next_live_time'] = $this->formatDate($value);
    }

    /**
     * Set timestamp attribute.
     *
     * @param string $value
     */
    public function setTimestampAttribute($value)
    {
        $this->attributes['timestamp'] = $this->formatDate($value);
    }
}
