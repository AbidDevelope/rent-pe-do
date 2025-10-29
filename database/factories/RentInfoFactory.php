<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\City;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = $this->faker->date('Y-m-d');
        return [
            'rent_id' => 1,
            'available_from' => $data,
            'month' => Carbon::parse($data)->format('F'),
            'city_id' => City::all()->random()->id,
            'area_id' => Area::all()->random()->id,
            'address' => $this->faker->address,
        ];
    }
}
