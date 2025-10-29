<?php

namespace App\Repositories;

use App\Models\RentInfo;
use Carbon\Carbon;

class RentInfoRepository extends Repository
{
  public function model()
  {
    return RentInfo::class;
  }

  public function storeByRequest($request, $rent): RentInfo
  {

    $rent_info = $this->model()::updateOrCreate([
      'rent_id' => $rent->id,
      'available_from' => $request->available_from,
      'month' => Carbon::parse($request->available_from)->format('F'),
      'city_id' => $request->city,
      'area_id' => $request->area,
      'address' => $request->address
    ]);

    return $rent_info;
  }

  public function updateByRequest($request, $rent)
  {
    return $rent->rentInfo->update([
      'rent_id' => $rent->id,
      'available_from' => $request->available_from,
      'month' => Carbon::parse($request->available_from)->format('F'),
      'city_id' => $request->city,
      'area_id' => $request->area,
      'address' => $request->address
    ]);
  }
}
