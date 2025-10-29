<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BenefitResource extends JsonResource
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
            'lift' => $this->lift,
            'generator' => $this->generator,
            'guard' => $this->guard,
            'parking' => $this->parking,
            'gas' => $this->gas,
            'internet' => $this->internet
        ];
    }
}
