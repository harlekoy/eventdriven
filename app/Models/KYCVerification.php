<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KYCVerification extends Model
{
    // use HasUuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kyc_verifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'event',
        'verification_url',
        'email',
        'user_id',
    ];
}
