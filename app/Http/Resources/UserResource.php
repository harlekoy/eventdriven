<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id'         => $this->id,
            'username'   => $this->username,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'dob'        => $this->dob,
            'email'      => $this->email,
            'avatar'     => $this->avatar,
            'created_at' => $this->created_at->toW3cString(),
            'updated_at' => $this->updated_at->toW3cString(),
        ];

        if ($this->address) {
            $data['address']    = [
                'id'         => $this->address->id,
                'address_1'  => $this->address->address_1,
                'address_2'  => $this->address->address_2,
                'city'       => $this->address->city,
                'state'      => $this->address->state,
                'country'    => $this->address->country,
                'zip_code'   => $this->address->zip_code,
            ];
        }

        return $data;
    }
}
