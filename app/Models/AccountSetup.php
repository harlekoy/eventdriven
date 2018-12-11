<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AccountSetup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'setup_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'kyc',
        'phone',
        'bank',
    ];

    /**
     * Get user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get user's KYC ShuftiPro verification record.
     *
     * @return \App\Models\KYCVerification
     */
    public function kyc()
    {
        return $this->user->latestVerification('user');
    }

    /**
     * Get user's phone ShuftiPro verification record.
     *
     * @return \App\Models\KYCVerification
     */
    public function phone()
    {
        return $this->user->latestVerification('phone');
    }

    /**
     * Calculate percentage of user's progress on account setup.
     *
     * @return string
     */
    public function percentage()
    {
        $count = collect($this->fillable)
            ->reject(function ($field) {
                return $field;
            })->count();

        return ($count / count($this->fillable)) * 100 . "% Complete";
    }
}
