<?php

namespace App\Console\Commands;

use App\Models\Competitor;
use App\Models\SportEvent;
use App\Models\Tournament;
use App\Models\Venue;
use Betprophet\Betradar\Facades\Betradar;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FetchSchedulesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:schedules {--tournament=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar list of schedule of events.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->fetchSchedules();
        $schedules = $response['schedules'];

        foreach ($schedules as $data) {
            $this->saveSportEvent($data);
            $this->saveVenue($data);
        }
    }

    /**
     * Save sport event.
     *
     * @return void
     */
    public function saveSportEvent($data)
    {
        $event = SportEvent::firstOrNew(array_only($data, 'id'));
        $competitors = $data['competitors.competitor'];

        $event->betradarFill(
            array_merge(array_only($data, $event->getFillable()), [
                'scheduled'      => Carbon::parse($data['scheduled']),
                'next_live_time' => Carbon::parse($data['next_live_time']),
                'venue_id'       => array_get($data, 'venue.id'),
                'tournament_id'  => array_get($data, 'tournament.id'),
            ])
        )->save();

        foreach ($competitors as $item) {
            $competitor = Competitor::firstOrNew(array_only($item, 'id'));

            $competitor->betradarFill(array_merge([
                'sport_event_id' => $event->id,
            ], $item))->save();
        }

        $event->betradarFill([
            'name' => collect($competitors)
                ->pluck('name')
                ->implode(' vs ')
        ])->save();
    }

    /**
     * Save venue.
     *
     * @param  array $response
     *
     * @return void
     */
    public function saveVenue($response)
    {
        $data = $response['venue'];

        if ($data) {
            $venue = Venue::firstOrNew(array_only($data, 'id'));
            $venue->betradarFill($data)->save();
        }
    }

    /**
     * Get fetch betradar sport event schedules.
     *
     * @return array
     */
    public function fetchSchedules()
    {
        $response = Betradar::unifiedFeed()
            ->staticSportEvents
            ->schedules(now()->toDateString());

        return $this->filterSchedules($response);
    }

    /**
     * Filter schedule list based on the enabled tournaments.
     *
     * @param  array $response
     *
     * @return array
     */
    public function filterSchedules($response)
    {
        $ids = $this->tournamentIds();

        $schedules = collect($response['schedules'])
            ->filter(function ($schedule) use ($ids) {
                return in_array(
                    array_get($schedule, 'tournament.id'), array_keys($ids)
                );
            })
            ->map(function ($schedule) use ($ids) {
                $tournamentId = array_get($schedule, 'tournament.id');

                return array_merge($schedule, [
                    'sport_id' => array_get($ids, $tournamentId),
                ]);
            })
            ->all();

        return array_merge($response, compact('schedules'));
    }

    /**
     * Get tournaments IDs.
     *
     * @return array
     */
    public function tournamentIds()
    {
        $tournament = array_filter(explode(',', $this->option('tournament')));

        if (!$tournament) {
            return Tournament::enabled()
                ->pluck('sport_id', 'id')
                ->all();
        }

        return Tournament::whereIn('id', $tournament)
            ->pluck('sport_id', 'id')
            ->all();
    }
}
