<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ForRentResource extends JsonResource
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
            'male_student' => $this->male_student,
            'female_student' => $this->female_student,
            'man_job' => $this->man_job,
            'women_job' => $this->women_job,
            'businessman' => $this->businessman,
            'any' => $this->any
        ];
    }
}
