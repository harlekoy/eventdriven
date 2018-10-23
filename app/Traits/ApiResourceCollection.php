<?php

namespace App\Traits;

use App\Http\Resources\Collection;

trait ApiResourceCollection
{
    /**
     * Create new anonymous resource collection.
     *
     * @param  mixed  $resource
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public static function collection($resource)
    {
        return new Collection($resource, get_called_class());
    }
}
