<?php

namespace App\Http\Controllers\Web\Cities;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = (new CityRepository())->getAll();
        return view('cities.index', compact('cities'));
    }

    public function store(CityRequest $request)
    {
        (new CityRepository())->storeByRequest($request);
        return redirect()->route('city')->with('success','City added successfully');
    }

    public function edit(CityRequest $request,City $city)
    {
        (new CityRepository())->updateByRequest($request,$city);
        return redirect()->route('city')->with('success','City update successfully');
    }
}
