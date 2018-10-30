<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    use ApiResource;

    protected static $logAttributes = ['sport_league'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'player';

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Player::class,
            'request'  => Request::class,
            'resource' => PlayerResource::class,
        ]);
    }
}
