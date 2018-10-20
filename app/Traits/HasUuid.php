<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait HasUuid
{
    /**
     * Boot has uuid.
     */
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::generate()->string;
        });
    }
}
