<?php

use Harlekoy\ApiDocs\ApiGroup;
use Illuminate\Database\Seeder;

class ApiEndpointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->groups() as $data) {
            $group = ApiGroup::create(array_except($data, 'endpoints'));

            foreach ($data['endpoints'] as $endpoint) {
                $group->endpoints()->create($endpoint);
            }
        }
    }

    /**
     * Get API groups with there endpoints.
     *
     * @return array
     */
    public function groups()
    {
        return [
            [
                'name'        => 'Sports',
                'description' => 'Betradar sports integration',
                'endpoints'   => $this->sports(),
            ], [
                'name' => 'Seasons',
                'description' => 'Betradar seasons integration',
                'endpoints' => $this->seasons(),
            ], [
                'name' => 'Categories',
                'description' => 'Betradar categories integration',
                'endpoints' => $this->categories(),
            ], [
                'name' => 'Countries',
                'description' => 'App specific countries',
                'endpoints' => $this->countries(),
            ], [
                'name' => 'Competitors',
                'description' => 'Betradar competitors integration',
                'endpoints' => $this->competitors(),
            ], [
                'name' => 'Teams',
                'description' => 'Betradar teams integration',
                'endpoints' => $this->teams(),
            ], [
                'name' => 'Jerseys',
                'description' => 'Betradar jerseys integration',
                'endpoints' => $this->jerseys(),
            ], [
                'name' => 'Players',
                'description' => 'Betradar players integration',
                'endpoints' => $this->players(),
            ], [
                'name' => 'Sport Events',
                'description' => 'Betradar sport events integration',
                'endpoints' => $this->sportEvents(),
            ], [
                'name' => 'Tournaments',
                'description' => 'Betradar tournaments integration',
                'endpoints' => $this->tournaments(),
            ], [
                'name' => 'Transactions',
                'description' => 'User based transactions',
                'endpoints' => $this->transactions(),
            ], [
                'name' => 'Uploads',
                'description' => 'Authenticated user uploads',
                'endpoints' => $this->uploads(),
            ], [
                'name' => 'Users',
                'description' => 'Application users',
                'endpoints' => $this->users(),
            ], [
                'name' => 'User Addresses',
                'description' => 'Application user addresses',
                'endpoints' => $this->addresses(),
            ], [
                'name' => 'Venues',
                'description' => 'Betradar tournaments integration',
                'endpoints' => $this->venues(),
            ]
        ];
    }

    /**
     * API endpoints for sports.
     *
     * @return array
     */
    public function sports()
    {
        return [
            [
                'endpoint'    => '/sports',
                'method'      => 'GET',
                'description' => 'Get list of sports from Betradar',
            ], [
                'endpoint'    => '/sports/{sport}',
                'method'      => 'GET',
                'description' => 'Get the specific sport from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for seasons.
     *
     * @return array
     */
    public function seasons()
    {
        return [
            [
                'endpoint'    => '/seasons',
                'method'      => 'GET',
                'description' => 'Get list of seasons from Betradar',
            ], [
                'endpoint'    => '/seasons/{season}',
                'method'      => 'GET',
                'description' => 'Get the specific season from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for categories.
     *
     * @return array
     */
    public function categories()
    {
        return [
            [
                'endpoint'    => '/categories',
                'method'      => 'GET',
                'description' => 'Get list of categories from Betradar',
            ], [
                'endpoint'    => '/categories/{category}',
                'method'      => 'GET',
                'description' => 'Get the specific category from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for countries.
     *
     * @return array
     */
    public function countries()
    {
        return [
            [
                'endpoint'    => '/countries',
                'method'      => 'GET',
                'description' => 'Get list of available countries',
            ],
        ];
    }

    /**
     * API endpoints for competitors.
     *
     * @return array
     */
    public function competitors()
    {
        return [
            [
                'endpoint'    => '/competitors',
                'method'      => 'GET',
                'description' => 'Get list of competitors from Betradar',
            ], [
                'endpoint'    => '/competitors/{competitor}',
                'method'      => 'GET',
                'description' => 'Get the specific competitor from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for teams.
     *
     * @return array
     */
    public function teams()
    {
        return [
            [
                'endpoint'    => '/teams',
                'method'      => 'GET',
                'description' => 'Get list of teams from Betradar',
            ], [
                'endpoint'    => '/teams/{team}',
                'method'      => 'GET',
                'description' => 'Get the specific team from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for jerseys.
     *
     * @return array
     */
    public function jerseys()
    {
        return [
            [
                'endpoint'    => '/jerseys',
                'method'      => 'GET',
                'description' => 'Get list of jerseys from Betradar',
            ], [
                'endpoint'    => '/jerseys/{jersey}',
                'method'      => 'GET',
                'description' => 'Get the specific jersey from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for players.
     *
     * @return array
     */
    public function players()
    {
        return [
            [
                'endpoint'    => '/players',
                'method'      => 'GET',
                'description' => 'Get list of players from Betradar',
            ], [
                'endpoint'    => '/players/{player}',
                'method'      => 'GET',
                'description' => 'Get the specific player from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for sport events.
     *
     * @return array
     */
    public function sportEvents()
    {
        return [
            [
                'endpoint'    => '/sportEvents',
                'method'      => 'GET',
                'description' => 'Get list of sport events from Betradar',
            ], [
                'endpoint'    => '/sportEvents/{player}',
                'method'      => 'GET',
                'description' => 'Get the specific sport event from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for tournaments.
     *
     * @return array
     */
    public function tournaments()
    {
        return [
            [
                'endpoint'    => '/tournaments',
                'method'      => 'GET',
                'description' => 'Get list of tournaments from Betradar',
            ], [
                'endpoint'    => '/tournaments/{tournament}',
                'method'      => 'GET',
                'description' => 'Get the specific tournament from Betradar',
            ],
        ];
    }

    /**
     * API endpoints for transactions.
     *
     * @return array
     */
    public function transactions()
    {
        return [
            [
                'endpoint'    => '/transactions',
                'method'      => 'GET',
                'description' => 'Get user transaction list',
            ], [
                'endpoint'    => '/transactions/{transaction}',
                'method'      => 'GET',
                'description' => 'Get the user specific transaction',
            ],
        ];
    }

    /**
     * API endpoints for venues.
     *
     * @return array
     */
    public function venues()
    {
        return [
            [
                'endpoint'    => '/venues',
                'method'      => 'GET',
                'description' => 'Get user venue list',
            ], [
                'endpoint'    => '/venues/{venue}',
                'method'      => 'GET',
                'description' => 'Get the user specific venue',
            ],
        ];
    }

    /**
     * API endpoints for upload.
     *
     * @return array
     */
    public function uploads()
    {
        return [
            [
                'endpoint'    => '/upload',
                'method'      => 'POST',
                'description' => 'Upload file for authenticated user',
            ],
        ];
    }

    /**
     * API endpoints for users.
     *
     * @return array
     */
    public function users()
    {
        return [
            [
                'endpoint'    => '/users',
                'method'      => 'GET',
                'description' => 'Get user list',
            ], [
                'endpoint'    => '/users/{user}',
                'method'      => 'GET',
                'description' => 'Get the user specific user',
            ], [
                'endpoint'    => '/users',
                'method'      => 'POST',
                'description' => 'Create user',
            ], [
                'endpoint'    => '/users/{user}',
                'method'      => 'PUT',
                'description' => 'Update details for user',
            ], [
                'endpoint'    => '/users/{user}',
                'method'      => 'DELETE',
                'description' => 'Delete user',
            ],
        ];
    }

    /**
     * API endpoints for user addresses.
     *
     * @return array
     */
    public function addresses()
    {
        return [
            [
                'endpoint'    => '/users/{user}/addresses',
                'method'      => 'GET',
                'description' => 'Get user list',
            ], [
                'endpoint'    => '/users/{user}/addresses/{address}',
                'method'      => 'GET',
                'description' => 'Get the user specific user',
            ], [
                'endpoint'    => '/users/{user}/addresses',
                'method'      => 'POST',
                'description' => 'Create user',
            ], [
                'endpoint'    => '/users/{user}/addresses/{address}',
                'method'      => 'PUT',
                'description' => 'Update details for user',
            ], [
                'endpoint'    => '/users/{user}/addresses/{address}',
                'method'      => 'DELETE',
                'description' => 'Delete user',
            ],
        ];
    }
}
