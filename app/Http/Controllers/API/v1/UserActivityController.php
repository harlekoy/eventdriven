<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\ActivityResource;
use App\Models\User;

class UserActivityController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return ResourceCollection
     */
    public function index(User $user)
    {
        return ActivityResource::collection($user->actions);
    }
}
