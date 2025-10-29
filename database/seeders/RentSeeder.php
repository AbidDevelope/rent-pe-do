<?php

namespace Database\Seeders;

use App\Models\Cost;
use App\Models\Rent;
use App\Models\Customer;
use App\Models\Facility;
use App\Models\ForRent;
use App\Models\Religion;
use App\Models\RentInfo;
use App\Models\RentThumbnail;
use Illuminate\Database\Seeder;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();

        foreach($customers as $customer){
            Rent::factory(rand(5, 10))->create(['customer_id' => $customer->id]);
        }
        
        foreach(Rent::all() as $rent){
            Cost::factory()->create(['rent_id' => $rent->id,'rent_price' => $rent->price]);
            Facility::factory()->create(['rent_id' => $rent->id]);
            ForRent::factory()->create(['rent_id' => $rent->id]);
            Religion::factory()->create(['rent_id' => $rent->id]);
            RentInfo::factory()->create(['rent_id' => $rent->id]);
            RentThumbnail::factory(4)->create(['rent_id' => $rent->id]);
        }

    }
}
