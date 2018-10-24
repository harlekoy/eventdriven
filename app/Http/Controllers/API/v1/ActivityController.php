<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\ActivityResourceCollection as ResourceCollection;
use App\Traits\ApiResource;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
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
            'model'    => Activity::class,
            'request'  => Request::class,
            'resource' => ActivityResource::class,
        ];
    }
}
