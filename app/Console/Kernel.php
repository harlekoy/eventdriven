<?php

namespace App\Console;

use App\Console\Commands\FetchCategoriesCommand;
use App\Console\Commands\FetchCompetitorCommand;
use App\Console\Commands\FetchCompetitorsCommand;
use App\Console\Commands\FetchJerseysCommand;
use App\Console\Commands\FetchSchedulesCommand;
use App\Console\Commands\FetchSportsCommand;
use App\Console\Commands\FetchTournamentsCommand;
use App\Console\Commands\TraitMakeCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        FetchCategoriesCommand::class,
        FetchCompetitorCommand::class,
        FetchCompetitorsCommand::class,
        FetchSchedulesCommand::class,
        FetchSportsCommand::class,
        FetchTournamentsCommand::class,
        TraitMakeCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('telescope:prune')->daily();
        $schedule->command('horizon:snapshot')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
