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

        static::updated(function ($model) {
            if ($data = request()->get('address')) {
                $address = $model->address ?? new Address(['user_id' => $model->id]);

                $address->fill($data)->save();
            }
        });
    }
}
