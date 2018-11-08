<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Traits\BetradarTestUtils;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
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
            'endpoint' => '/api/v1/categories',
            'model'    => Category::class,
            'data'     => [
                'id', 'name', 'country_code',
            ],
        ];
    }
}
