<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Competitor;
use App\Models\Jersey;
use App\Models\Player;
use App\Models\Season;
use App\Models\Sport;
use App\Models\Tournament;
use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Console\Command;

class FetchCompetitorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:competitor {competitor}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar competitor full details.';

    /**
     * @var \App\Models\Competitor
     */
    protected $competitor;

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
        $response = $this->fetchCompetitor();

        $this->updateCompetitor($response);

        $this->saveJerseys($response);
        $this->saveManager($response);
        $this->savePlayers($response);
    }

    /**
     * Update competitor record.
     *
     * @param  array $response
     *
     * @return void
     */
    public function updateCompetitor($response)
    {
        $this->competitor = Competitor::find(array_get($response, 'competitor.id'));
        $this->competitor->fill([
            'manager_id' => array_get($response, 'manager.id'),
            'venue_id'   => array_get($response, 'venue.id'),
        ])->save();
    }

    /**
     * Save competitor manager.
     *
     * @param  array $response
     *
     * @return void
     */
    public function saveManager($response)
    {
        $this->savePlayers($response, [array_get($response, 'manager')]);
    }

    /**
     * Save competitor jerseys.
     *
     * @param  array $response
     *
     * @return void
     */
    public function savePlayers($response, $players = null)
    {
        $players = $players ?? array_get($response, 'players') ?? [];

        foreach (array_filter($players) as $data) {
            $player = Player::firstOrNew(array_only($data, 'id'));

            $player->betradarFill(array_merge($data, [
                'sport_id'   => array_get($response, 'sport.id'),
            ]))->save();

            $player->competitors()
                ->syncWithoutDetaching(array_filter([$this->competitor->id ?? null]));
        }
    }

    /**
     * Save competitor players.
     *
     * @param  array $response
     *
     * @return void
     */
    public function saveJerseys($response)
    {
        $jerseys = array_get($response, 'jerseys') ?? [];

        foreach (array_filter($jerseys) as $data) {
            $jersey = Jersey::firstOrNew(array_only($data, 'id'));

            $jersey->betradarFill(array_merge($data, [
                'competitor_id' => array_get($response, 'competitor.id'),
            ]))->save();
        }
    }

    /**
     * Get fetch betradar competitor full details.
     *
     * @return array
     */
    public function fetchCompetitor()
    {
        return Betradar::unifiedFeed()
            ->entity
            ->competitor($this->argument('competitor'));
    }
}
