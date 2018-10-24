<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use App\Traits\ApiRelatedResource;

class UserAddressController extends Controller
{
    use ApiRelatedResource;

    /**
     * Initialize API resource.
     *
     * @return array
     */
    public function init()
    {
        return [
            'model'    => User::class,
            'related'  => Address::class,
            'request'  => AddressRequest::class,
            'resource' => AddressResource::class,
        ];
    }
}
