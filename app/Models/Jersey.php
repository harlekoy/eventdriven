<?php

namespace App\Models;

use App\Models\Competitor;
use Illuminate\Database\Eloquent\Model;

class Jersey extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'competitor_id',
        'type',
        'base',
        'sleeve',
        'number',
        'squares',
        'stripes',
        'horizontal_stripes',
        'split',
        'shirt_type',
        'sleeve_detail',
        'betradar_data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'betradar_data' => 'array',
    ];

    /**
     * Get jersey.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competitor()
    {
        return $this->belongsTo(Competitor::class);
    }
}
