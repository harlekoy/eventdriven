<?php

namespace App\Nova\Filters;

use App\Models\Country as Model;
use App\Traits\FilterResource;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Country extends Filter
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
            'model_field'      => 'country_code',
            'related_field'    => 'alpha_3',
            'related_instance' => new Model,
        ];
    }
}
