<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VenueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'capacity'          => $this->capacity,
            'city_name'         => $this->city_name,
            'country_code'      => $this->country_code,
            'map_coordinates'   => $this->map_coordinates,
            'betradar_data'     => $this->betradar_data,
        ];
    }
}
