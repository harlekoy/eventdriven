<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'id'           => $this->id,
            'category_id'  => $this->category_id,
            'sport_id'     => $this->sport_id,
            'name'         => $this->name,
            'abbreviation' => $this->abbreviation,
            'country_code' => $this->country_code,
        ];
    }
}
