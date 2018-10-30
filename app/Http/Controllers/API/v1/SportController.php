<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\SportResource;
use App\Models\Sport;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class SportController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Sport::class,
            'request'  => Request::class,
            'resource' => SportResource::class,
        ]);
    }
}
