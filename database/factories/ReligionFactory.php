<?php

namespace Database\Factories;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReligionFactory extends Factory
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
            'islam' => $this->faker->boolean(),
            'hindu' => $this->faker->boolean(),
            'christian' => $this->faker->boolean(),
            'bouddho' => $this->faker->boolean(),
            'any' => $this->faker->boolean(),
        ];
    }
}
