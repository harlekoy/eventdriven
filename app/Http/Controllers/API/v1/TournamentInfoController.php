<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\TournamentInfoResource;
use App\Models\TournamentInfo;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class TournamentInfoController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => TournamentInfo::class,
            'request'  => Request::class,
            'resource' => TournamentInfoResource::class,
        ]);
    }
}
