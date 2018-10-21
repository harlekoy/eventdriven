<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Address;
use App\Models\User;
use App\Traits\ApiResource;

class UserController extends Controller
{
    use ApiResource;

    /**
     * Initialize API resource.
     *
     * @return array
     */
    public function init()
    {
        return [
            'model'    => User::class,
            'request'  => UserRequest::class,
            'resource' => UserResource::class,
        ];
    }
}
