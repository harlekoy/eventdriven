<?php

namespace App\Console\Commands;

use App\Jobs\CompetitorDetails;
use App\Models\Category;
use App\Models\Competitor;
use App\Models\Season;
use App\Models\Sport;
use App\Models\Tournament;
use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Console\Command;

class FetchCompetitorsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:competitors {--tournament=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar list of competitors.';

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
        foreach ($this->tournamentIds() as $id) {
            $response = $this->fetchCompetitors($id);

            $this->saveCompetitors($response);
        }
    }

    /**
     * Save selected competitors.
     *
     * @param  array $response
     * @return array
     */
    public function saveCompetitors($response)
    {
        $competitors = array_get($response, 'competitors', []);
        $info = array_get($response, 'tournament_info', []);

        foreach ($competitors as $data) {
            $competitor = Competitor::firstOrNew(array_only($data, 'id'));

            $competitor->betradarFill(array_merge([
                'category_id'   => array_get($info, 'category.id'),
                'sport_id'      => array_get($info, 'sport.id'),
                'tournament_id' => array_get($info, 'tournament.id'),
            ], $data))->save();

            dispatch(new CompetitorDetails($competitor));
        }
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
                ->pluck('id')
                ->all();
        }

        return $tournament;
    }

    /**
     * Get fetch betradar competitors.
     *
     * @param string $tournamentId
     *
     * @return array
     */
    public function fetchCompetitors($tournamentId)
    {
        return Betradar::unifiedFeed()
            ->sportEvents
            ->competitors($tournamentId);
    }
}
