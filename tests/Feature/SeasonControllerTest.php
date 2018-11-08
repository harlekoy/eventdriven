<?php

namespace Tests\Feature;

use App\Models\Season;
use App\Traits\BetradarTestUtils;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeasonControllerTest extends TestCase
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
            'endpoint' => '/api/v1/seasons',
            'model'    => Season::class,
            'data'     => [
                'id',
                'name',
                'start_date',
                'end_date',
                'year',
            ],
        ];
    }
}
