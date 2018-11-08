<?php

namespace App\Console\Commands;

use App\Models\Sport;
use App\Models\SportEvent;
use Betprophet\Betradar\Facades\Betradar;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FetchSportEventsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:sports-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar list of sport events.';

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
        foreach ($this->events() as $data) {
            $info = array_merge($data['info'], [
                'scheduled' => Carbon::parse(array_get($data, 'info.scheduled')),
            ]);

            $event = SportEvent::firstOrNew(array_only($info, 'id'));
            $event->betradarFill($info)->save();
        }
    }

    /**
     * Get fetch betradar sports.
     *
     * @return array
     */
    public function fetchSportEvents()
    {
        return Betradar::unifiedFeed()->sportEvents->events();
    }

    /**
     * Get list of sports.
     *
     * @return array
     */
    public function events()
    {
        $response = $this->fetchSportEvents();

        return $response['events'];
        // return [
        //     array_get($this->betradarResponse(), 'info');
        //     array_get($this->betradarResponse(), 'tournament');
        //     array_get($this->betradarResponse(), 'sport');
        //     array_get($this->betradarResponse(), 'category');
        //     array_get($this->betradarResponse(), 'competitors');
        //     array_get($this->betradarResponse(), 'venue');
        // ];
    }
}
