<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KYCResource extends JsonResource
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
            'user_id' => $this->user_id,
            'reference' => $this->uuid,
            'type' => $this->type,
            'event' => $this->event,
            'verification_url' => $this->verification_url,
            'email' => $this->email,
            'message' => $this->message
        ];
    }
}
