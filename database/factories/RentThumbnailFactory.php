<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentThumbnailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rent_id' => 1,
            'media_id' => Media::factory()->create()
        ];
    }
}
