<?php

namespace App\Nova;

use App\Nova\Actions\SportEventRequestRecovery;
use App\Nova\Filters\Sport;
use App\Nova\Filters\Status;
use App\Nova\Filters\Tournament;
use App\Nova\Filters\Venue;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\CloudinaryImage;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class SportEvent extends Resource
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
    public static $model = 'App\\Models\\SportEvent';

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
        'id',
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
            ID::make()->sortable()
                ->hideFromIndex(),

            CloudinaryImage::make('Image'),

            Text::make('Name')->sortable(),

            DateTime::make('Next Live Time')
                ->format('MMM DD, YYYY h:m A')
                ->hideFromIndex(),

            DateTime::make('Scheduled')
                ->format('MMM DD, YYYY h:m A')
                ->sortable(),

            BelongsTo::make('Sport')
                ->sortable(),

            BelongsTo::make('Venue')
                ->hideFromIndex(),

            BelongsTo::make('Tournament')
                ->sortable(),

            Boolean::make('Start Time TBD')
                ->hideFromIndex(),

            Select::make('Live Odds', 'liveodds')
                ->options([
                    'not_available' => 'Not Available',
                    'booked'        => 'Booked',
                    'bookable'      => 'Bookable',
                    'buyable'       => 'Buyable',
                ])
                ->displayUsingLabels()
                ->hideFromIndex(),

            Select::make('Status')
                ->options([
                    'not_started' => 'Not Started',
                    'live'        => 'Live',
                    'ended'       => 'Ended',
                    'closed'      => 'Closed',
                    'cancelled'   => 'Cancelled',
                    'postponed'   => 'Postponed',
                    'suspended'   => 'Suspended',
                    'interrupted' => 'Interrupted',
                    'delayed'     => 'Delayed',
                ])
                ->displayUsingLabels()
                ->sortable(),

            HasMany::make('Competitors'),

            HasMany::make('Odds Changes', 'oddsChanges'),

            HasMany::make('Recoveries'),
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
            new Tournament($this),
            new Sport($this),
            new Venue($this),
            new Status,
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
            new SportEventRequestRecovery,
        ];
    }
}
