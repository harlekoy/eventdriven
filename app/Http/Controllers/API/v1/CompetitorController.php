<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\CompetitorResource;
use App\Models\Competitor;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Competitor::class,
            'request'  => Request::class,
            'resource' => CompetitorResource::class,
        ]);
    }
}
