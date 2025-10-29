<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @return void
     */
    public function run()
    {
        $this->createAdminUser();
    }

    private function createAdminUser()
    {
        $adminUser = User::factory()->create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
            'phone' => '01234567891',
        ]);

        $adminUser->assignRole('admin');
    }
}
