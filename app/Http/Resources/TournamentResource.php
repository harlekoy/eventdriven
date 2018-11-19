<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TournamentResource extends JsonResource
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
            'image'         => Storage::disk('cloudinary')->url($this->image),
            'sport_id'      => $this->sport_id,
            'season_id'     => $this->season_id,
            'category_id'   => $this->category_id,
            'name'          => $this->name,
        ];
    }
}
