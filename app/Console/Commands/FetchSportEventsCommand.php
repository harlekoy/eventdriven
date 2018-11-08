<?php

namespace App\Console\Commands;

use App\Models\Sport;
use Betprophet\Betradar\Facades\Betradar;
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
            $sport = SportEvent::firstOrNew(array_only($data, 'id'));
            $sport->betradarFill($data)->save();
        }
    }

    /**
     * Get fetch betradar sports.
     *
     * @return array
     */
    public function betradarResponse()
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
        return [
            array_get($this->betradarResponse(), 'info');
            array_get($this->betradarResponse(), 'tournament');
            array_get($this->betradarResponse(), 'sport');
            array_get($this->betradarResponse(), 'category');
            array_get($this->betradarResponse(), 'competitors');
            array_get($this->betradarResponse(), 'venue');
        ];
    }
}
