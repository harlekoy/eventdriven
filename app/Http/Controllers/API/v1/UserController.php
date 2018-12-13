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

    /**
     * "updated" controller event.
     *
     * @param  \App\Http\Requests\UserRequest $request
     * @param  \App\Models\User $model
     */
    public function updated($request, $model)
    {
        if ($data = $request->get('address', [])) {
            $address = $model->address ?? new Address(['user_id' => $model->id]);

            $address->fill($data)->save();
        }
    }
}
