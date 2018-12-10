<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\WagerResource;
use App\Models\Wager;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class WagerController extends Controller
{
    use ApiResource;

    /**
     * API controller constructor.
     */
    public function __construct()
    {
        $this->apiInstances([
            'model'    => Wager::class,
            'request'  => Request::class,
            'resource' => WagerResource::class,
        ]);
    }
}
