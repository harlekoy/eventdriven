<?php

namespace Tests\Feature;

use App\Models\Tournament;
use App\Traits\BetradarTestUtils;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TournamentControllerTest extends TestCase
{
    use BetradarTestUtils;

    /**
     * Initialize test case.
     *
     * @return array
     */
    public function init()
    {
        return [
            'endpoint' => '/api/v1/tournaments',
            'model'    => Tournament::class,
            'data'     => [
                'id',
                'sport_id',
                'season_id',
                'category_id',
                'name',
            ],
        ];
    }
}
