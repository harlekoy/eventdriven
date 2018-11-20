<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Address extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_1',
        'address_2',
        'city',
        'state',
        'country',
        'alpha_2',
        'zip_code',
    ];

    protected static $logAttributes = [
        'address_1',
        'address_2',
        'city',
        'state',
        'country',
        'alpha_2',
        'zip_code'
    ];

    protected static $logOnlyDirty = true;
    protected static $logName = 'address';

    /**
     * Get user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
