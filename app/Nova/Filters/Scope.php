<?php

namespace App\Nova\Filters;

use App\Models\Producer;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Scope extends Filter
{
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
        return $query->where('scope', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return Producer::query()
            ->distinct()
            ->get()
            ->mapWithKeys(function ($producer) {
                return [
                    ucwords($producer->scope) => $producer->scope,
                ];
            })
            ->all();
    }
}
