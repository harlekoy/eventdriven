<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SportResource extends JsonResource
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
            'id'    => str_replace('sr:sport:', '', $this->id),
            'image' => Storage::disk('cloudinary')->url($this->image),
            'name'  => $this->name,
        ];
    }
}
