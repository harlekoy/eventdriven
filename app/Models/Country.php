<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alpha_2',
        'alpha_3',
        'country_code',
        'iso_3166_2',
        'region',
        'sub_region',
        'intermediate_region',
        'region_code',
        'sub_region_code',
        'intermediate_region_code',
    ];

    /**
     * Get sport categories for country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'country_code', 'country_code');
    }

    /**
     * Get country list of enabled sports.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function sports()
    {
        return $this->hasManyThrough(Sport::class, Category::class);
    }

    /**
     * Get flag image attribute.
     *
     * @return string
     */
    public function getFlagAttribute()
    {
        $code = strtolower($this->alpha_2);

        return asset("country-flags/{$code}.png");
    }
}
