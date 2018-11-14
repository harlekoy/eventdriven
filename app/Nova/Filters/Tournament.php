<?php

namespace App\Nova\Filters;

use App\Models\Tournament as Model;
use App\Traits\FilterResource;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Tournament extends Filter
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
            'model_field'      => 'tournament_id',
            'related_field'    => 'id',
            'related_instance' => new Model,
        ];
    }
}
