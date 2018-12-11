<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WagerResource extends JsonResource
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
            'id'                 => $this->id,
            'sport_event_id'     => $this->sport_event_id,
            'type_id'            => $this->wagerable->id,
            'type'               => $this->wagerable->getTable(),
            'bet_type'           => $this->bet_type,
            'total_wager_value'  => $this->total_wager_value,
            'odds'               => $this->odds,
            'selling_percentage' => $this->selling_percentage,
            'selling_price'      => $this->selling_price,
            'status'             => $this->status,
            'date'               => $this->updated_at->toW3cString(),
        ];
    }
}
