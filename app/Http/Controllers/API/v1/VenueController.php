<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\VenueResource;
use App\Models\Venue;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Venue::class,
            'request'  => Request::class,
            'resource' => VenueResource::class,
        ]);
    }
}
