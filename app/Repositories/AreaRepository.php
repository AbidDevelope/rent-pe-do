<?php

namespace App\Repositories;

use App\Http\Requests\AreaAdminRequest;
use App\Models\Area;

class AreaRepository extends Repository
{
   public function model()
   {
    return Area::class;
   }

   public function getAll()
   {
       $areas = $this->model()::query();

       return $areas->latest('id')->get();
   }

   public function storeByRequest(AreaAdminRequest $request): Area
   {
      return $this->model()::create([
         'name' => $request->name,
         'city_id' => $request->city_id
      ]);
   }

   public function updateByRequest($request,Area $area)
   {
      $area->update([
         'name' => $request->name,
         'city_id' => $request->city_id
      ]);
      return $area;
   }


}