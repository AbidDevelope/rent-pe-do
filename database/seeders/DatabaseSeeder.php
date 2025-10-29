<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AreaSeeder::class); 
        $this->call(UserVisitorSeeder::class); 

        if(app()->environment('local')){
            $this->call(UserAdminSeeder::class);
            $this->call(CustomerSeeder::class);
            $this->call(RentSeeder::class);
            $this->call(FavoriteSeeder::class);
        }

        if(!app()->environment('local')){
            $this->call(UserProductionSeeder::class);
        }

        $this->command->warn('Installing passport client');
        Artisan::call('passport:install');
        $this->command->info('Passport client installed');

    }
}
