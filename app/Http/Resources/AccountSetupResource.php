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
            'kyc'        => $this->verifiedKyc(),
            'phone'      => $this->verifiedPhone(),
            'bank'       => (bool) $this->bank,
            'percentage' => $this->percentage()
        ];
    }

    /**
     * Check if KYC is already verified.
     *
     * @return boolean
     */
    protected function verifiedKyc()
    {
        return $this->resource->kyc()->event ?? (bool) $this->kyc;
    }

    /**
     * Check if phone is verified.
     *
     * @return boolean
     */
    protected function verifiedPhone()
    {
        return $this->resource->phone()->event ?? (bool) $this->phone;
    }
}
