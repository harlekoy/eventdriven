<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Season;
use App\Models\Sport;
use App\Models\SportEvent;
use App\Traits\TournamentHasCompetitions;
use App\Traits\TournamentHasSportEvents;

class Tournament extends BetradarModel
{
    use TournamentHasSportEvents;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sport_id',
        'season_id',
        'category_id',
        'name',
        'round',
        'scheduled',
        'played',
        'max_coverage_level',
        'min_coverage_level',
        'max_covered',
        'live_coverage',
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
     * Get category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get season.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get tournament sport events.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sportEvents()
    {
        return $this->hasMany(SportEvent::class);
    }

    /**
     * Get image attribute.
     *
     * @return string|null
     */
    public function getImageAttribute()
    {
        return $this->attributes['image'] ?? $this->season->image ?? null;
    }
}
