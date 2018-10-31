<?php

namespace App\Nova\Filters;

use App\Models\Country as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Country extends Filter
{
    /**
     * @var \App\Nova\Resource
     */
    protected $resource;

    /**
     * @var string
     */
    protected $field;

    public function __construct($resource, $field = 'country_code')
    {
        $this->resource = $resource->resource;
        $this->field = $field;
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where($this->field, $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return Model::query()
            ->whereIn('alpha_3', $this->countryCodes())
            ->pluck('alpha_3', 'name');
    }

    /**
     * Get model country codes.
     *
     * @return array
     */
    public function countryCodes()
    {
        return $this->resource
            ->query()
            ->distinct()
            ->pluck($this->field)
            ->all();
    }
}
