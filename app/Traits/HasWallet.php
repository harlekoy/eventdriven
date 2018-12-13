<?php

namespace App\Traits;

use App\Models\Wallet;

trait HasWallet
{
    /**
     * Boot Has Wallet.
     */
    protected static function bootHasWallet()
    {
        static::created(function ($model) {
            $model->wallet()->create([
                'balance' => 0,
            ]);
        });
    }

    /**
     * Get user wallet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
}
