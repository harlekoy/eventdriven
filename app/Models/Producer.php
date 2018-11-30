<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Producer extends BetradarModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'api_url',
        'active',
        'scope',
        'stateful_recovery_window_in_minutes',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'betradar_data' => 'array',
        'active'        => 'boolean',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = last(array_filter(explode('/', $model->api_url)));
        });
    }

    /**
     * Set active status.
     *
     * @param boolean $value
     */
    public function setActiveAttribute($value)
    {
        $expiresAt = now()->addSeconds(60);

        Cache::put("betradar:producer:{$this->id}", $value, $expiresAt);
    }

    /**
     * Get producer active status.
     *
     * @return boolean
     */
    public function getActiveAttribute()
    {
        return Cache::get("betradar:producer:{$this->id}", false);
    }
}
