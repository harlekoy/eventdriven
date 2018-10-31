<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Sport;
use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Console\Command;

class FetchCategoriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'betradar:categories {--sport=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Betradar list of categories on each sports.';

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
        foreach ($this->sports() as $sport) {
            $response = $this->fetchCategories($sport->id);

            foreach ($response['categories'] as $data) {
                $category = Category::firstOrNew(array_only($data, 'id'));
                $category->sport_id = array_get($response, 'sport.id');
                $category->betradarFill($data)->save();
            }
        }
    }

    /**
     * Only sports that are enabled.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sports()
    {
        return Sport::enabled()
            ->where(function ($query) {
                $option = $this->option('sport');
                $sports = array_filter(explode(',', $option));

                if ($option && $sports) {
                    $query->whereIn('id', $sports);
                }
            })
            ->get();
    }

    /**
     * Get fetch betradar sport categories.
     *
     * @return array
     */
    public function fetchCategories($id)
    {
        return Betradar::unifiedFeed()->sportEvents->categories($id);
    }
}
