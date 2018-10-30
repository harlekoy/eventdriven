<?php

namespace App\Console\Commands;

use App\Models\Sport;
use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Console\Command;

class FetchSportsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:sports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar list of sports.';

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
        foreach ($this->sports() as $data) {
            $sport = Sport::firstOrNew(array_only($data, 'id'));
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
        return Betradar::unifiedFeed()->sportEvents->sports();
    }

    /**
     * Get list of sports.
     *
     * @return array
     */
    public function sports()
    {
        return array_get($this->betradarResponse(), 'sports', []);
    }
}
