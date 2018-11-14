<?php

namespace App\Nova\Filters;

use App\Models\Venue as Model;
use App\Traits\FilterResource;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Venue extends Filter
{
    use FilterResource;

    /**
     * Initialize filter.
     *
     * @return array
     */
    public function init()
    {
        return [
            'model_field'      => 'venue_id',
            'related_field'    => 'id',
            'related_instance' => new Model,
        ];
    }
}
