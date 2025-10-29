<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'rent_price' => $this->rent_price,
            'electric' => $this->electric,
            'water' => $this->water,
            'gas' => $this->gas,
            'service' => $this->service,
            'negotiable' => $this->negotiable,
            'others' => $this->others,
        ];
    }
}
