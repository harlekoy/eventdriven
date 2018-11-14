<?php

namespace App\Nova\Filters;

use App\Models\Sport as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Sport extends Filter
{
    /**
     * @var \App\Nova\Resource
     */
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource->resource;
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
        return $query->where('sport_id', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return Model::enabled()
            ->whereIn('id', $this->enabledSports())
            ->pluck('id', 'name');
    }

    /**
     * Get the enabled sports.
     *
     * @return array
     */
    public function enabledSports()
    {
        return $this->resource
            ->query()
            ->distinct()
            ->pluck('sport_id')
            ->all();
    }
}
