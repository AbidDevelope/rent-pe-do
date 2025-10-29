<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/city.json");
        $citys = json_decode($json);

        foreach ($citys as $value) {
            City::create([
                'name' => $value->name,
                'short_name' => $value->shortname,
            ]);
        }
        
    }
}
