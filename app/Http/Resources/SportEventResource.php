<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SportEventResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->tournament_id,
            'start_date'    => $this->scheduled,
            'end_date'      => $this->start_time_tbd,
            'year'          => $this->status,
            'betradar_data' => $this->betradar_data,
        ];
    }
}
