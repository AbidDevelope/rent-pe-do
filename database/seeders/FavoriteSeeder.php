<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Favorite;
use App\Models\Rent;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        $favorites = [];
        foreach(Customer::all() as $customer){
            $favorites[] = [
                'customer_id' => $customer->id,
                'rent_id' => Rent::all()->random()->id,
                'created_at' => now()
            ];
        }

        Favorite::insert($favorites);
    }
}
