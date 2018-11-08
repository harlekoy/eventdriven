<?php

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('betradar:sports');

        foreach ($this->enableSports() as $id => $sport) {
            $sport = Sport::find($id);
            $sport->enable = 1;
            $sport->save();
        }
    }

    /**
     * Default enabled sports data.
     *
     * @return array
     */
    public function enableSports()
    {
        return [
            'sr:sport:1'  => 'Soccer',
            'sr:sport:2'  => 'Basketball',
            'sr:sport:3'  => 'Baseball',
            'sr:sport:5'  => 'Tennis',
            'sr:sport:6'  => 'Handball',
            'sr:sport:16' => 'American Football',
            'sr:sport:19' => 'Snooker',
            'sr:sport:21' => 'Cricket',
            'sr:sport:22' => 'Darts',
            'sr:sport:23' => 'Volleyball',
            'sr:sport:37' => 'Squash',
        ];
    }
}
