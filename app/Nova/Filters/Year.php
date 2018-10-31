<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Year extends Filter
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
        return $query->where('year', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return $this->years();
    }

    /**
     * Get years.
     *
     * @return array
     */
    public function years()
    {
        return $this->resource
            ->query()
            ->pluck('year', 'year')
            ->unique()
            ->all();
    }
}
