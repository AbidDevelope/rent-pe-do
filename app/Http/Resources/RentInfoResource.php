<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RentInfoResource extends JsonResource
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
            'available_from' => Carbon::parse($this->available_from)->format('d M Y'),
            'month' => $this->month,
            'city' => (new CityResource($this->city)),
            'area' => ['id' => $this->area?->id, 'name' => $this->area?->name],
            'address' => $this->address,
        ];
    }
}
