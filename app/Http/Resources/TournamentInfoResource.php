<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentInfoResource extends JsonResource
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
            'id'                    => $this->id,
            'tournament_id'         => $this->tournament_id,
            'season_id'             => $this->season_id,
            'round'                 => $this->round,
            'scheduled'             => $this->scheduled,
            'played'                => $this->played,
            'max_coverage_level'    => $this->max_coverage_level,
            'max_covered'           => $this->max_covered,
            'live_coverage'         => $this->live_coverage,
            'betradar_data'         => $this->betradar_data,
        ];
    }
}
