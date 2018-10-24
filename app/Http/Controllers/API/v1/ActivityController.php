<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\ActivityResourceCollection as ResourceCollection;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Activity $activity
     * @return ResourceCollection
     */
    public function index(Activity $activity)
    {
        return new ResourceCollection($activity->paginate());
    }
}
