<?php

namespace Database\Factories;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\Factory;

class CostFactory extends Factory
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
            'rent_price' => $this->faker->randomFloat(3,80,300),
            'electric' => $this->faker->randomFloat(2,10,30),
            'water' => $this->faker->randomFloat(2,5,10),
            'gas' => $this->faker->randomFloat(2,10,15),
            'service' => $this->faker->randomFloat(2,10,20),
            'negotiable' => $this->faker->boolean(),
            'others' => $this->faker->randomFloat(2,5,10),
        ];
    }
}
