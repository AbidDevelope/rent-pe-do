<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        $customers = [];
        for($i = 0; $i < 15; $i++){
            $user = User::factory()->create([
                'email' => 'customer-'.$i.'@example.com'
            ]);
            $customers[] = [
                'user_id' => $user->id,
                'created_at' => now()
            ];
            $user->assignRole('customer');
        }

        Customer::insert($customers);
    }
}
