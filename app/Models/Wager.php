<?php

namespace App\Models;

use App\Models\SportEvent;
use Illuminate\Database\Eloquent\Model;

class Wager extends Model
{
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
