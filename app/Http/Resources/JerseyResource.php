<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JerseyResource extends JsonResource
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
            'competitor_id'         => $this->competitor_id,
            'type'                  => $this->type,
            'base'                  => $this->base,
            'sleeve'                => $this->sleeve,
            'number'                => $this->number,
            'squares'               => $this->squares,
            'stripes'               => $this->stripes,
            'horizontal_stripes'    => $this->horizontal_stripes,
            'split'                 => $this->split,
            'shirt_type'            => $this->shirt_type,
            'sleeve_detail'         => $this->sleeve_detail,
            'betradar_data'         => $this->betradar_data,
        ];
    }
}
