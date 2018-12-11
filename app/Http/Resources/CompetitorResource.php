<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitorResource extends JsonResource
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
            'id'             => $this->id,
            'name'           => $this->name,
            'abbreviation'   => $this->abbreviation,
            'qualifier'      => $this->qualifier,
            'country_code'   => $this->country_code,
            'sport_event_id' => $this->sportEvent->id ?? null,
            'sport_id'       => $this->sport_id,
            'venue_id'       => $this->venue_id,
            'manager_id'     => $this->manager_id,
        ];
    }
}
