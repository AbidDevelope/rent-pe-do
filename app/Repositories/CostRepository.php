<?php

namespace App\Repositories;

use App\Models\Cost;
use App\Models\Rent;

class CostRepository extends Repository
{
   public function model()
   {
    return Cost::class;
   }

   public function storeByRequest($request,$rent): Cost
   {
      return $this->model()::create([
        'rent_id' => $rent->id,
        'rent_price' => $request->rent_price,
        'electric' => $request->electric_bill,
        'water' => $request->water_bill,
        'gas' => $request->gas_bill,
        'service' => $request->service_bill,
        'negotiable' => $request->negotiable,
        'others' => $request->others_bill
      ]);
   }

   public function updateByRequest($request, $rent)
   {
     return $rent->cost->update([
         'rent_id' => $rent->id,
        'rent_price' => $request->rent_price,
        'electric' => $request->electric_bill,
        'water' => $request->water_bill,
        'gas' => $request->gas_bill,
        'service' => $request->service_bill,
        'negotiable' => $request->negotiable,
        'others' => $request->others_bill
      ]);

   }


}