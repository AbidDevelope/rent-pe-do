<?php

namespace Database\Factories;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForRentFactory extends Factory
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
            'male_student' => $this->faker->boolean(),
            'female_student' => $this->faker->boolean(),
            'man_job' => $this->faker->boolean(),
            'women_job' => $this->faker->boolean(),
            'any' => $this->faker->boolean(),
        ];
    }
}
