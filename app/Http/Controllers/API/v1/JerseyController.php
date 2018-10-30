<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\JerseyResource;
use App\Models\Jersey;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class JerseyController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Jersey::class,
            'request'  => Request::class,
            'resource' => JerseyResource::class,
        ]);
    }
}
