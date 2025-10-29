<?php

namespace Database\Seeders;

use App\Models\Cost;
use Illuminate\Database\Seeder;

class RentPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $costs = Cost::all();
        foreach ($costs as $cost) {
            $rent = $cost->rent;
            $rent->update([
                'price' => $cost->rent_price
            ]);
        }
    }
}
