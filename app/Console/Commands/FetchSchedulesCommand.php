<?php

namespace App\Console\Commands;

use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Console\Command;

class FetchSchedulesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:schedules';

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
        //
    }

    /**
     * Get fetch betradar sports.
     *
     * @return array
     */
    public function betradarResponse()
    {
        return Betradar::unifiedFeed()->sportEvents->schedules();
    }
}
