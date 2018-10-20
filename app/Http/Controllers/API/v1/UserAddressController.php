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
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => User::class,
            'related'  => Address::class,
            'request'  => AddressRequest::class,
            'resource' => AddressResource::class,
        ]);
    }
}
