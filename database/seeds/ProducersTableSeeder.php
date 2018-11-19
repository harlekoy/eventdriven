<?php

use App\Models\Producer;
use Betprophet\Betradar\Facades\Betradar;
use Illuminate\Database\Seeder;

class ProducersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = $this->fetchProducers();

        foreach ($response['producers'] as $data) {
            $producer = Producer::firstOrNew(array_only($data, 'id'));
            $producer->betradarFill($data)->save();
        }
    }

    /**
     * Fetch betradar producers.
     *
     * @return array
     */
    public function fetchProducers()
    {
        return Betradar::unifiedFeed()
            ->betting
            ->availableProducers();
    }
}
