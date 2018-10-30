<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\TournamentResource;
use App\Models\Tournament;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Tournament::class,
            'request'  => Request::class,
            'resource' => TournamentResource::class,
        ]);
    }
}
