<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => 1,
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(50),
            'type' => $this->faker->randomElement(config('enums.rent_types')),
            'washroom' => $this->faker->randomNumber(1, 5),
            'balcony' => $this->faker->randomNumber(1, 4),
            'position' => $this->faker->randomElement(config('enums.positions')),
            'bad' => $this->faker->randomNumber(1, 6),
            'price' => $this->faker->randomFloat(3,80,300),
            'is_active' => $this->faker->boolean()
        ];
    }
}
