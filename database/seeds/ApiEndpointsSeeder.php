<?php

use Harlekoy\ApiDocs\Drivers\Database\Models\ApiGroup;
use Harlekoy\ApiDocs\Drivers\Database\Models\Endpoint;
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
        $this->truncate();

        foreach ($this->groups() as $data) {
            $group = ApiGroup::create(array_except($data, 'endpoints'));

            foreach ($data['endpoints'] as $endpoint) {
                $group->endpoints()->create($endpoint);
            }
        }
    }

    /**
     * Truncate tables.
     *
     * @return void
     */
    public function truncate()
    {
        Endpoint::truncate();
        ApiGroup::truncate();
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
                'name'        => 'Authentication',
                'description' => 'Betprophet authentication process',
                'endpoints'   => $this->authentications(),
            ], [
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
                'name' => 'Sport Event Competitors',
                'description' => 'Sport event\'s competitors integration',
                'endpoints' => $this->sportEventCompetitors(),
            ], [
                'name' => 'Sport Event Players',
                'description' => 'Sport event\'s players integration',
                'endpoints' => $this->sportEventPlayers(),
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
            ], [
                'name' => 'Wagers',
                'description' => 'Application wagers',
                'endpoints' => $this->wagers(),
            ],
        ];
    }

    /**
     * API endpoints for user authentication.
     *
     * @return array
     */
    public function authentications()
    {
        return [
            [
                'endpoint'    => '/login',
                'method'      => 'POST',
                'description' => 'Login user',
            ], [
                'endpoint'    => '/social/redirect/{provider}',
                'method'      => 'GET',
                'description' => 'Redirect to social login provider',
            ],  [
                'endpoint'    => '/social/callback/{provider}',
                'method'      => 'GET',
                'description' => 'Handle social provider callback',
            ], [
                'endpoint'    => '/register',
                'method'      => 'POST',
                'description' => 'Signup new user',
            ], [
                'endpoint'    => '/password/change',
                'method'      => 'POST',
                'description' => 'Change authenticated user password',
            ], [
                'endpoint'    => '/password/email',
                'method'      => 'POST',
                'description' => 'Send reset link email',
            ], [
                'endpoint'    => '/password/reset',
                'method'      => 'POST',
                'description' => 'Reset user password',
            ], [
                'endpoint'    => '/auth',
                'method'      => 'GET',
                'description' => 'Get the authenticated user record',
            ],
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
                'endpoint'    => '/sport-events',
                'method'      => 'GET',
                'description' => 'Get list of sport events from Betradar',
            ], [
                'endpoint'    => '/sport-events/{event}',
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

    /**
     * API endpoints for sport event competitors.
     *
     * @return array
     */
    public function sportEventCompetitors()
    {
        return [
            [
                'endpoint'    => '/sport-events/{event}/competitors',
                'method'      => 'GET',
                'description' => 'Get sport event competitors list',
            ], [
                'endpoint'    => '/sport-events/{event}/competitors/{competitor}',
                'method'      => 'GET',
                'description' => 'Get the sport event specific competitor',
            ],
        ];
    }

    /**
     * API endpoints for sport event players.
     *
     * @return array
     */
    public function sportEventPlayers()
    {
        return [
            [
                'endpoint'    => '/sport-events/{event}/players',
                'method'      => 'GET',
                'description' => 'Get sport event players list',
            ],
        ];
    }

    /**
     * API endpoints for wagers.
     *
     * @return array
     */
    public function wagers()
    {
        return [
            [
                'endpoint'    => '/wagers',
                'method'      => 'GET',
                'description' => 'Get wager list',
            ], [
                'endpoint'    => '/wagers/{wager}',
                'method'      => 'GET',
                'description' => 'Get the specific wager',
            ], [
                'endpoint'    => '/wagers',
                'method'      => 'POST',
                'description' => 'Create wager',
            ], [
                'endpoint'    => '/wagers/{wager}',
                'method'      => 'PUT',
                'description' => 'Update details for wager',
            ], [
                'endpoint'    => '/wagers/{wager}',
                'method'      => 'DELETE',
                'description' => 'Delete wager',
            ],
        ];
    }
}
