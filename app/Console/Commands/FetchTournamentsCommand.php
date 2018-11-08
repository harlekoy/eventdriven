<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Season;
use App\Models\Sport;
use App\Models\Tournament;
use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Console\Command;

class FetchTournamentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:tournaments {--sport=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar list of tournaments.';

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
        $response = $this->fetchTournaments();
        $tournaments = $this->filteredTournaments($response['tournaments']);

        $this->saveTournaments($tournaments);
    }

    /**
     * Get the filtered tournaments.
     *
     * @param  array $tournaments
     * @return array
     */
    public function filteredTournaments($tournaments)
    {
        $sportIds = $this->sportIds();

        return array_filter($tournaments,
            function ($tournament) use ($sportIds) {
                return in_array(
                    array_get($tournament, 'sport.id'),
                    $sportIds
                );
            }
        );
    }

    /**
     * Save selected tournaments.
     *
     * @param  array $tournaments
     * @return array
     */
    public function saveTournaments($tournaments)
    {
        foreach ($tournaments as $data) {
            $tournament = Tournament::firstOrNew(array_only($data, 'id'));
            $coverage = array_get($data, 'season_coverage_info') ?? [];

            $tournament->betradarFill(array_merge([
                'id'          => array_get($data, 'id'),
                'name'        => array_get($data, 'name'),
                'category_id' => array_get($data, 'category.id'),
                'sport_id'    => array_get($data, 'sport.id'),
            ], $coverage))->save();

            $this->upsertSeason($data);
            $this->upsertCategory($data);
        }
    }

    /**
     * Get sport IDs.
     *
     * @return array
     */
    public function sportIds()
    {
        $sports = array_filter(explode(',', $this->option('sport')));

        if (!$sports) {
            return Sport::enabled()
                ->pluck('id')
                ->all();
        }

        return $sports;
    }

    /**
     * Create or update season.
     *
     * @return void
     */
    public function upsertSeason($data)
    {
        $data = array_get($data, 'current_season', []);

        if ($data) {
            $season = Season::firstOrNew(array_only($data, 'id'));
            $season->betradarFill($data)->save();
        }
    }

    /**
     * Create or update category.
     *
     * @return void
     */
    public function upsertCategory($response)
    {
        $data = array_get($response, 'category', []);

        if ($data) {
            $category = Category::firstOrNew(array_only($data, 'id'));
            $category->betradarFill($data);
            $category->sport_id = array_get($response, 'sport.id');
            $category->save();
        }
    }

    /**
     * Get fetch betradar tournaments.
     *
     * @return array
     */
    public function fetchTournaments()
    {
        return Betradar::unifiedFeed()->sportEvents->tournaments();
    }
}
