<?php

namespace App\Nova;

use App\Nova\Filters\Country;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\CloudinaryImage;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Player extends Resource
{
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Betradar';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Player';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        $name =  $this->sport->name ?? '';

        return $name.' - '.ucfirst($this->type);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable()
                ->hideFromIndex(),

            CloudinaryImage::make('Image'),

            BelongsTo::make('Sport')
                ->sortable(),

            Text::make('Name')
                ->sortable(),

            Number::make('Jersey No.', 'jersey_number')
                ->sortable(),

            Text::make('Type')
                ->sortable(),

            Date::make('Date of Birth')
                ->sortable()
                ->format('MMM DD, YYYY'),

            Text::make('Nationality')
                ->sortable()
                ->hideFromIndex(),

            BelongsTo::make('Country')
                ->sortable()
                ->hideFromIndex(),

            Number::make('Height')
                ->sortable()
                ->hideFromIndex(),

            Number::make('Weight')
                ->sortable()
                ->hideFromIndex(),

            Select::make('Gender')
                ->options([
                    'male'   => 'Male',
                    'female' => 'Female',
                ])
                ->displayUsingLabels()
                ->hideFromIndex(),
        ];
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
            new Country($this),
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
