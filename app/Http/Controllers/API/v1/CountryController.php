<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Traits\ApiResource;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ApiResource;

    /**
     * Initialize API resource.
     *
     * @return array
     */
    public function init()
    {
        return [
            'model'    => Country::class,
            'request'  => Request::class,
            'resource' => CountryResource::class,
        ];
    }
}
