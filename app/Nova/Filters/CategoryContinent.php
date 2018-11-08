<?php

namespace App\Nova\Filters;

use App\Models\Country;
use App\Nova\Filters\Continent;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class CategoryContinent extends Continent
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $continent)
    {
        $countries = $this->countries($continent);

        return $query->whereHas('category', function ($query) use ($countries) {
            $query->whereIn('country_code', $countries);
        });
    }

    /**
     * Get all countries within that continent.
     *
     * @return array
     */
    public function countries($continent)
    {
        return Country::where('region', $continent)
            ->pluck('alpha_3')
            ->all();
    }

    /**
     * Get the displayable name of the filter.
     *
     * @return string
     */
    public function name()
    {
        return 'Continent';
    }
}
