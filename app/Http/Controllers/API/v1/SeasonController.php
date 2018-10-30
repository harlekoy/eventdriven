<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\SeasonResource;
use App\Models\Season;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Season::class,
            'request'  => Request::class,
            'resource' => SeasonResource::class,
        ]);
    }
}
