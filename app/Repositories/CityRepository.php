<?php

namespace App\Repositories;

use App\Http\Requests\CityRequest;
use App\Models\City;

class CityRepository extends Repository
{
   public function model()
   {
    return City::class;
   }

   public function getAll()
   {
       $cities = $this->model()::query();

       return $cities->latest('id')->get();
   }

   public function storeByRequest(CityRequest $request): City
   {
      return $this->model()::create([
            'name' => $request->name,
            'short_name' => $request->short_name
      ]);
   }

   public function updateByRequest($request,City $city): City
   {
      $city->update([
         'name' => $request->name,
         'short_name' => $request->short_name
      ]);
      return $city;
   }


}