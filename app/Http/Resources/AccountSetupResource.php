<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountSetupResource extends JsonResource
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
            'user_id'    => $this->user_id,
            'email'      => (bool) $this->email,
            'kyc'        => $this->kyc()->event ?? (bool) $this->kyc,
            'phone'      => $this->phone()->event ?? (bool) $this->phone,
            'bank'       => (bool) $this->bank,
            'percentage' => $this->percentage()
        ];
    }
}
