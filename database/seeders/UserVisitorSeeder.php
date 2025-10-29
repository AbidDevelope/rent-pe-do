<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserVisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'first_name' => 'Visitor',
            'email' => 'visitor@example.com',
            'password' => Hash::make('visitor@123'),
            'phone' => '01234567889',
        ]);

        $user->assignRole('visitor');
    }
}
