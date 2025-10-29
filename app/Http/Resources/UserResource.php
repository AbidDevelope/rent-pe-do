<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'contact' => $this->phone,
            'additionla_contact' => $this->additional_phone,
            'email_verified' => Carbon::parse($this->email_verified_at)->format('M d, Y H:i'),
            'phone_verified' => Carbon::parse($this->phone_verified_at)->format('M d, Y H:i'),
            'profile_photo' => $this->thumbnail,
            'is_approved' => $this->is_approved
        ];
    }
}
