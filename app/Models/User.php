<?php

namespace App\Models;

use App\Models\Address;
use App\Models\CompleteAccount;
use App\Models\KYCVerification;
use App\Models\Upload;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use App\ShuftiPro\ShuftiPro;
use App\Traits\HasAddress;
use App\Traits\HasAvatar;
use App\Traits\HasSocialProvider;
use App\Traits\HasWallet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasAddress, HasAvatar,
        CausesActivity, HasApiTokens, HasSocialProvider,
        HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id',
        'avatar',
        'dob',
        'email',
        'first_name',
        'last_name',
        'password',
        'phone_number',
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
    public function verifications()
    {
        return $this->hasMany(KYCVerification::class, 'user_id');
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

    /**
     * Check if user is verified or in verification process.
     *
     * @param  sting  $type
     *
     * @return boolean
     */
    public function isUserVerified($type)
    {
        return (bool) self::userVerifications($type)->count() >= 1;
    }

    /**
     * Get latest verification record of user from type.
     *
     * @param  string $type
     *
     * @return \App\Models\KYCVerification
     */
    public function latestVerification($type)
    {
        return $this->verifications
            ->where('type', $type)
            ->sortByDesc('created_at')
            ->first();
    }

    /**
     * Return all verification records with accepted or pending status of user.
     *
     * @param  string $type
     *
     * @return \Illuminate\Support\Collection
     */
    private function userVerifications($type)
    {
        $verifications = $this->verifications
            ->where('type', $type)
            ->whereIn('event', [
                ShuftiPro::VERIFICATION_ACCEPTED,
                ShuftiPro::REQUEST_PENDING
            ]);

        return $verifications;
    }

    /**
     * Get complete account record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accountSetup()
    {
        return $this->hasOne(AccountSetup::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
