<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class CompetitorDetails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var App\Models\Competitor
     */
    protected $competitor;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($competitor)
    {
        $this->competitor = $competitor;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('betradar:competitor', [
            'competitor' => $this->competitor->id,
        ]);
    }
}
