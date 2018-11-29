<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    /**
     * Get odds change.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oddsChange()
    {
        return $this->belongsTo(OddsChange::class);
    }
}
