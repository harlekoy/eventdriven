<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class Status extends Filter
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
        return $query->where('status', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Cancelled'   => 'cancelled',
            'Closed'      => 'closed',
            'Delayed'     => 'delayed',
            'Ended'       => 'ended',
            'Interrupted' => 'interrupted',
            'Live'        => 'live',
            'Not Started' => 'not_started',
            'Postponed'   => 'postponed',
            'Suspended'   => 'suspended',
        ];
    }
}
