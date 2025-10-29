<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citys = City::all();

        $json = File::get('database/data/area.json');
        $areas = json_decode($json);

        foreach ($citys as $city) {
            foreach($areas as $area){
                Area::create([
                    'city_id' => $city->id,
                    'name' => $area->name
                ]);
            }
        }

    }
}