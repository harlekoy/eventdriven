<?php

namespace App\Http\Resources;

use App\Http\Resources\AddressResource;
use App\Http\Resources\Collection as ResourceCollection;
use App\Traits\ApiResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    use ApiResourceCollection;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'username'   => $this->username,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'address'    => new AddressResource($this->whenLoaded('address')),
            'dob'        => $this->dob,
            'email'      => $this->email,
            'avatar'     => $this->avatar,
            'created_at' => $this->created_at->toW3cString(),
            'updated_at' => $this->updated_at->toW3cString(),
        ];
    }
}
