<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Models\SportEvent;
use App\Traits\ApiRelatedResource;
use Illuminate\Http\Request;

class SportEventPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $match)
    {
        $event = SportEvent::find($match);

        $players = $event->competitors
            ->map(function ($competitor) {
                return $competitor->players;
            })
            ->flatten();

        return PlayerResource::collection($players);
    }
}
