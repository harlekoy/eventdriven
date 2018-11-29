<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OddsChange extends BetradarModel
{
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
}
