<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Team::class,
            'request'  => Request::class,
            'resource' => TeamResource::class,
        ]);
    }
}
