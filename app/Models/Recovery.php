<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product',
        'event_id',
        'is_done',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_done' => 'boolean',
    ];

    /**
     * Get odds change producer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producer()
    {
        return $this->belongsTo(Producer::class, 'product', 'slug');
    }

    /**
     * Get sport event/match
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(SportEvent::class, 'event_id');
    }

    /**
     * Mark recovery done.
     *
     * @return boolean
     */
    public function done()
    {
        return $this->fill(['is_done' => true])->save();
    }
}
