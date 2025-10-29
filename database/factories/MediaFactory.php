<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'image',
            'name' => $this->faker->word,
            'src' => 'images/dummy/dummy-user.png',
            'extension' => 'png',
            'description' => $this->faker->sentence,
            'path' => 'images/dummy/'
        ];
    }
}
