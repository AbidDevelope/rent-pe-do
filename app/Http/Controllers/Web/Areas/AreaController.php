<?php

namespace App\Http\Controllers\Web\Areas;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaAdminRequest;
use App\Models\Area;
use App\Repositories\AreaRepository;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = (new AreaRepository())->getAll();
        $cities = (new CityRepository())->getAll();
        return view('areas.index', compact('areas', 'cities'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(AreaAdminRequest $request)
    {
        (new AreaRepository())->storeByRequest($request);
        return redirect()->back()->with('success', 'Area added successfully');
    }

    public function areaStore(Request $request)
    {
        $request->validate(['name' => 'required|unique:areas,name']);

        $pattern = '/\(([^,]+),\s([^)]+)\)/';
        $coordinates = [];
        preg_match_all($pattern, $request->coordinates, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $lat = $match[1];
            $lng = $match[2];
            $coordinates[] = array('lat' => floatval($lat), 'lng' => floatval($lng));
        }

        $area = Area::create(['name' => $request->name]);

        foreach ($coordinates as $coordinate) {
            $area->latLngs()->attach($area->id, [
                'lat' => $coordinate['lat'],
                'lng' => $coordinate['lng']
            ]);
        }
        return redirect()->route('area')->with('success', 'Area added successfully');
    }

    public function update(AreaAdminRequest $request, Area $area)
    {
        (new AreaRepository())->updateByRequest($request, $area);
        return redirect()->back()->with('success', 'Area updated successfully');
    }

    public function edit(Area $area){
        $latLongs = $area->latLngs;
        $latLng = collect([]);
        foreach ($latLongs as $latlng) {
            $latLng[] = (object) [
                'lat' => $latlng->pivot->lat, 
                'lng' => $latlng->pivot->lng
            ];
        }
        return view('areas.edit', compact('area', 'latLng'));
    }
}
