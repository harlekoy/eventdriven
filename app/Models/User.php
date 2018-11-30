<?php

namespace App\Models;

use App\Models\Address;
use App\Models\KYCVerification;
use App\Models\Upload;
use App\Traits\HasAddress;
use App\Traits\HasAuth0;
use App\Traits\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable, HasAuth0, HasAddress,
        HasAvatar, CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id',
        'auth0id',
        'avatar',
        'dob',
        'email',
        'first_name',
        'last_name',
        'password',
        'phone_number',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get user's addresses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get user's primary address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Get user's full address.
     *
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return implode(", ",array_filter(
            array_only(
                $this->address->toArray(), [
                'address_1',
                'address_2',
                'city',
                'state',
                'country',
                'alpha_2',
                'zip_code'
        ])));
    }

    /**
     * Get KYC verification record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kyc()
    {
        return $this->hasOne(KYCVerification::class, 'user_id')->latest();
    }

    /**
     * Get all of the user's uploads.
     */
    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    /**
     * Get user fullname.
     *
     * @return string
     */
    public function getFullnameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Set password attribute.
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
