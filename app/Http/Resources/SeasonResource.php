<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SeasonResource extends JsonResource
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
            'name'          => $this->name,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date,
            'year'          => $this->year,
        ];
    }
}
