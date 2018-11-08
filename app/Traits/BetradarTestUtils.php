<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseTransactions;

trait BetradarTestUtils
{
    use DatabaseTransactions;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $expectedData;

    /**
     * @var integer
     */
    protected $limit;

    /**
     * Setup Betradar models API endpoints.
     */
    public function setUp()
    {
        parent::setUp();

        $init = $this->init();

        $this->endpoint = $init['endpoint'];
        $this->expectedData = $init['data'];
        $this->limit = array_get($init, 'limit', 25);

        app()->instance(Model::class, new $init['model']);

        $this->seedModel();
    }

    /**
     * Seed model table.
     *
     * @return void
     */
    public function seedModel()
    {
        $model = app(Model::class);

        factory(get_class($model), $this->limit)->create();
    }

    /**
     * Get random model ID.
     *
     * @return string
     */
    public function modelId()
    {
        return app(Model::class)
            ->latest()
            ->first()
            ->id;
    }

    /**
     * Test API endpoint for getting the available list.
     *
     * @return void
     */
    public function testGetList()
    {
        $response = $this->json('GET', $this->endpoint);
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->expectedData,
                ]
            ]);
    }

    /**
     * Test API endpoint for getting a specific item.
     *
     * @return void
     */
    public function testGetModel()
    {
        $id = $this->modelId();
        $response = $this->json('GET', "{$this->endpoint}/$id");
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => $this->expectedData,
            ]);
    }
}
