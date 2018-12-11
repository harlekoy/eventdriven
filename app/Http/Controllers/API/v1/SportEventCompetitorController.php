<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\CompetitorResource;
use App\Models\Competitor;
use App\Models\SportEvent;
use App\Traits\ApiRelatedResource;
use Illuminate\Http\Request;

class SportEventCompetitorController extends Controller
{
    use ApiRelatedResource;

    /**
     * Initialize API resource.
     *
     * @return array
     */
    public function init()
    {
        return [
            'model'    => SportEvent::class,
            'related'  => Competitor::class,
            'request'  => Request::class,
            'resource' => CompetitorResource::class,
        ];
    }
}
