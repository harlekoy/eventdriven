<?php

namespace Tests\Feature;

use App\Models\Sport;
use App\Traits\BetradarTestUtils;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SportControllerTest extends TestCase
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
            'endpoint' => '/api/v1/sports',
            'model'    => Sport::class,
            'data'     => [
                'id', 'name', 'image'
            ],
        ];
    }
}
