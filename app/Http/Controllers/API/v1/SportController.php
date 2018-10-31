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
     * Initialize API resource.
     *
     * @return array
     */
    public function init()
    {
        return [
            'model'    => Sport::class,
            'request'  => Request::class,
            'resource' => SportResource::class,
        ];
    }
}
