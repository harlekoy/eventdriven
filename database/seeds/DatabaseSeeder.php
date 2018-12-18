<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(SportsTableSeeder::class);
        // $this->call(ApiEndpointsSeeder::class);
        $this->call(ProducersTableSeeder::class);
        $this->call(MatchStatusesTableSeeder::class);
    }
}
