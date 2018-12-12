<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
            'image'         => Storage::disk('cloudinary')->url($this->image),
            'sport_id'      => $this->sport->id ?? null,
            'venue_id'      => $this->venue->id ?? null,
            'tournament_id' => $this->tournament->id ?? null,
            'name'          => $this->name ?? $this->tournament->name,
            'status'        => $this->status,
        ];
    }
}
