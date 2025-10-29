<?php

namespace App\Http\Controllers\API\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Http\Resources\AreaResource;
use App\Http\Resources\CityResource;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return $this->json('City list',[
            'cities' => CityResource::collection($cities)
        ]);
    }

    public function cityWiseArea(AreaRequest $request)
    {
        $areas = Area::where('city_id',$request->city_id)->get();
        return $this->json('Area list',[
            'areas' => AreaResource::collection($areas)
        ]);
    }
}
