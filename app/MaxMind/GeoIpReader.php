<?php

namespace App\MaxMind;

use MaxMind\Db\Reader;

class GeoIpReader
{
    /**
     * Locate user's location based on user's IP.
     *
     * @return collection
     */
    public function locate()
    {
        $geolocation = null;

        // sample european ip address
        // $ipAddress = '185.18.140.236';
        $ipAddress = request()->ip();

        $location = new Reader($this->cityPath());

        $response = $location->get($ipAddress);

        if ($response) {
            $geolocation = $this->location($response);

            $location->close();
        }

        return $geolocation;
    }

    /**
     * Take City mmdb file from path.
     *
     * @return string
     */
    public function cityPath()
    {
        return resource_path('maxmind/city/geolite2-city.mmdb');
    }

    /**
     * Take Country mmdb file from path.
     *
     * @return string
     */
    public function countryPath()
    {
        return resource_path('maxmind/country/geolite2-country.mmdb');
    }

    /**
     * Get location details.
     *
     * @param  array $geolocation
     *
     * @return collection
     */
    public function location($geolocation)
    {
        return collect(array_dot($geolocation))
        ->only(
            'city.names.en',
            'postal.code',
            'country.names.en',
            'continent.names.en'
        );
    }
}
