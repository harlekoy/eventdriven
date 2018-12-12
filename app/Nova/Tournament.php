<?php

namespace App\Nova;

use App\Nova\Actions\Enable;
use App\Nova\Filters\Category;
use App\Nova\Filters\CategoryContinent;
use App\Nova\Filters\Enabled;
use App\Nova\Filters\Season;
use App\Nova\Filters\Sport;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\CloudinaryImage;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tournament extends Resource
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
    public static $model = 'App\\Models\\Tournament';

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
        return $this->sport->name ?? '';
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

            Boolean::make('Enabled', 'enable')
                ->sortable(),

            Text::make('Name')
                ->sortable(),

            BelongsTo::make('Sport')
                ->sortable(),

            BelongsTo::make('Season')
                ->sortable(),

            BelongsTo::make('Category')
                ->hideFromIndex(),

            Number::make('Round')
                ->hideFromIndex(),

            Number::make('Scheduled')
                ->hideFromIndex(),

            Number::make('Played')
                ->hideFromIndex(),

            Text::make('Min Coverage Level')
                ->hideFromIndex(),

            Text::make('Max Coverage Level')
                ->hideFromIndex(),

            Number::make('Max Covered')
                ->hideFromIndex(),

            Number::make('Live Coverage')
                ->hideFromIndex(),

            HasMany::make('Sport Events', 'sportEvents'),
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
            new Category,
            new CategoryContinent,
            new Enabled,
            new Season,
            new Sport($this),
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
        return [
            new Enable,
        ];
    }
}
