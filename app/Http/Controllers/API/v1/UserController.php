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
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => User::class,
            'request'  => UserRequest::class,
            'resource' => UserResource::class,
        ]);
    }
}
