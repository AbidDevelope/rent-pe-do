<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReligionResource extends JsonResource
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
            'islam' => $this->islam,
            'hindu' => $this->hindu,
            'christian' => $this->christian,
            'bouddho' => $this->bouddho,
            'any' => $this->any
        ];
    }
}
