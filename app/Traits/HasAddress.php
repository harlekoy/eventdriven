<?php

namespace App\Traits;

use App\Models\Address;

trait HasAddress
{
    /**
     * Boot has address.
     */
    protected static function bootHasAddress()
    {
        static::created(function ($model) {
            if ($data = request()->get('address')) {
                $model->addresses()->create($data);
            }
        });
    }
}
