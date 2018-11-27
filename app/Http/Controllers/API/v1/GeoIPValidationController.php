<?php

namespace App\Http\Controllers\API\v1;

use App\MaxMind\GeoIpReader;
use Illuminate\Support\Facades\File;

class GeoIPValidationController extends Controller
{
    /**
     * Validate and check if user is in set domain.
     *
     * @return \Illuminate\Http\Response
     */
    public function check()
    {
        $geoip = new GeoIpReader();

        $location = $geoip->locate();

        if ($location) {
            $area = $location->get('continent.names.en');

            if (in_array($area, $this->areas())) {
                return response()->json([
                    'valid' => true,
                    'message' => 'User\'s current location is valid.'
                ]);
            }
        }

        return response()->json([
            'valid' => false,
            'message' => 'User\'s current location is not allowed.'
        ]);
    }

    /**
     * Get areas allowed in the app.
     *
     * @return array
     */
    private function areas()
    {
        $areas = [];

        foreach (file(resource_path('maxmind/areas.txt')) as $line) {
            if (!starts_with($line, '#')) {
                $areas[] = str_replace("\n", '', $line);
            }
        }

        return $areas;
    }
}
