<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $rents = Rent::pluck('id')->toArray();
        return [
            'rent_id' => 1,
            'lift' => $this->faker->boolean(),
            'generator' => $this->faker->boolean(),
            'guard' => $this->faker->boolean(),
            'parking' => $this->faker->boolean(),
            'gas' => $this->faker->boolean(),
            'internet' => $this->faker->boolean(),
        ];
    }
}
