<?php

namespace App\Nova;

use App\Nova\Filters\Category;
use App\Nova\Filters\Country;
use App\Nova\Filters\Sport;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\CloudinaryImage;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Competitor extends Resource
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
    public static $model = 'App\\Models\\Competitor';

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

            CloudinaryImage::make('Image')
                ->onlyOnIndex(),

            BelongsTo::make('Team')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Name')
                ->sortable(),

            Text::make('Abbreviation')
                ->sortable(),

            BelongsTo::make('Sport')
                ->sortable(),

            BelongsTo::make('Sport Event', 'sportEvent')
                ->hideFromIndex(),

            BelongsTo::make('Country')
                ->sortable()
                ->display('name'),

            BelongsTo::make('Venue')
                ->sortable(),

            BelongsTo::make('Manager', 'manager', Player::class)
                ->sortable(),

            BelongsTo::make('Category')
                ->sortable()
                ->hideFromIndex(),

            Number::make('Player Count')
                ->onlyOnDetail(),

            BelongsToMany::make('Players'),
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
            new Sport($this),
            new Country($this),
            new Category,
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
