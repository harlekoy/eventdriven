<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\SportEventResource;
use App\Models\SportEvent;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class SportEventController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => SportEvent::class,
            'request'  => Request::class,
            'resource' => SportEventResource::class,
        ]);
    }
}
