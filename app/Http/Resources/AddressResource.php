<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'address_1'     => $this->address_1,
            'address_2'     => $this->address_2,
            'city'          => $this->city,
            'state'         => $this->state,
            'country'       => $this->country,
            'zip_code'      => $this->zip_code,
            'user_id'       => $this->user_id
        ];
    }
}
