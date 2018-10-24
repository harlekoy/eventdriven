<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\ActivityResourceCollection as ResourceCollection;
use App\Models\User;

class UserActivityController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return ResourceCollection
     */
    public function show(User $user)
    {
        return new ResourceCollection($user->actions()->paginate);
    }
}
