<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\WagerRequest;
use App\Http\Resources\WagerResource;
use App\Models\Competitor;
use App\Models\Player;
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
            'request'  => WagerRequest::class,
            'resource' => WagerResource::class,
        ]);
    }

    /**
     * Creating event.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function creating($request, $model)
    {
        $id = $request->get('type_id');
        $type = null;

        switch (true) {
            case starts_with($id, 'sr:competitor:'):
                $type = Competitor::class;
                break;

            case starts_with($id, 'sr:player:'):
                $type = Player::class;
                break;
        }

        $model->fill([
            'wagerable_id'   => $id,
            'wagerable_type' => $type,
        ]);
    }
}
