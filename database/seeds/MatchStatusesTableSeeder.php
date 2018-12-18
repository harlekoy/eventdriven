<?php

use App\Models\MatchStatus;
use Illuminate\Database\Seeder;

class MatchStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = $this->fetchMatchStatuses();

        foreach ($response['statuses'] as $data) {
            $producer = MatchStatus::firstOrNew(array_only($data, 'status_id'), $data);
            $producer->betradarFill($data)->save();
        }
    }

    /**
     * Fetch betradar match statuses.
     *
     * @return array
     */
    public function fetchMatchStatuses()
    {
        return Betradar::unifiedFeed()
            ->betting
            ->matchStatus();
    }
}
