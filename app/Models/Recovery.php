<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
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
}
