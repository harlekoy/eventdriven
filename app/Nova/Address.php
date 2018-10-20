<?php

namespace App\Nova;

use App\Nova\Filters\CountryAddress;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;

class Address extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Address';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'address';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'address_1',
        'address_2',
        'city',
        'state',
        'country',
        'zip_code',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('User')
                ->searchable()
                ->sortable()
                ->rules('required'),

            $this->addressFields(),
        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return \Illuminate\Http\Resources\MergeValue
     */
    protected function addressFields()
    {
        return $this->merge([
            Place::make('Address', 'address_1')
                ->sortable(),

            Text::make('Address Line 2', 'address_2')
                ->sortable()
                ->hideFromIndex(),

            Text::make('City')
                ->sortable(),

            Text::make('State')
                ->sortable(),

            Text::make('Postal Code', 'zip_code')
                ->sortable()
                ->hideFromIndex(),

            Country::make('Country')
                ->sortable(),
        ]);
    }

    public function title()
    {
        return "{$this->address_1}, {$this->city}, {$this->state}, {$this->country}, {$this->zip_code}";
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new CountryAddress
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
