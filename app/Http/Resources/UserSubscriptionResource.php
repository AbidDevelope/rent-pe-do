<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSubscriptionResource extends JsonResource
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
            'id' => $this->id,
            'available_ads' => (int) $this->available_ads,
            'payment_status' => (bool) $this->payment_status,
            'expiry_date' => $this->expiry_date,
            'price' => $this->subscription?->price,
            'name' => $this->subscription?->name,
            'duration' => $this->subscription?->duration . ' ' . $this->subscription?->duration_type,
            'number_of_ads' => (int) $this->subscription?->number_of_ads,
            'created_at' => $this->created_at,
        ];
    }
}
