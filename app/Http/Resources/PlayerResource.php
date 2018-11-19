<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PlayerResource extends JsonResource
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
            'full_name'     => $this->full_name,
            'type'          => $this->type,
            'date_of_birth' => $this->date_of_birth,
            'nationality'   => $this->nationality,
            'country_code'  => $this->country_code,
            'height'        => $this->height,
            'weight'        => $this->weight,
            'jersey_number' => $this->jersey_number,
            'gender'        => $this->gender,
        ];
    }
}
