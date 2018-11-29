<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OddsChange extends BetradarModel
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'timestamp' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product',
        'event_id',
        'timestamp',
        'status',
        'match_status',
        'expected_totals',
        'expected_supremacy',
    ];

    /**
     * Get odds change producer.
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
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(SportEvent::class, 'event_id');
    }

    /**
     * Get markets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markets()
    {
        return $this->hasMany(Market::class);
    }
}
