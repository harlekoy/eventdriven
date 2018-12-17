<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Country;
use App\Models\Sport;
use App\Models\Venue;
use App\Models\Wager;
use App\Traits\HasTeam;
use Illuminate\Database\Eloquent\Model;

class Competitor extends BetradarModel
{
    use HasTeam;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'abbreviation',
        'qualifier',
        'country_code',
        'sport_event_id',
        'category_id',
        'manager_id',
        'sport_id',
        'venue_id',
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
     * Get sport.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
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
     * Get country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'alpha_3');
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
     * Get team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'abbreviation', 'abbreviation');
    }

    /**
     * Get image attribute.
     *
     * @return string
     */
    public function getImageAttribute()
    {
        if ($this->team) {
            return $this->team->image;
        }
    }

    /**
     * Get all wagers placed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function wagers()
    {
        return $this->morphMany(Wager::class, 'wagerable');
    }

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
     * Get manager.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(Player::class, 'manager_id');
    }

    /**
     * Get players.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->belongsToMany(Player::class, 'competitor_players');
    }

    /**
     * Get player count.
     *
     * @return int
     */
    public function getPlayerCountAttribute()
    {
        return $this->players->count();
    }
}
