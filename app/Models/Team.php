<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Team extends Model
{
    use LogsActivity;

    protected static $logAttributes = [];
    protected static $logOnlyDirty = true;
    protected static $logName = 'team';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'abbreviation',
        'country_code',
        'sport_id',
        'category_id',
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
     * Get competitors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competitors()
    {
        return $this->hasMany(Competitor::class, 'abbreviation', 'abbreviation');
    }
}
