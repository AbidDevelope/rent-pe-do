<?php

namespace App\Repositories;

use App\Http\Requests\RentRequest;
use App\Models\Facility;

class FacilityRepository extends Repository
{
   public function model()
   {
    return Facility::class;
   }

   public function storeByRequest($request,$rent): Facility
   {
       
      $facility = $this->model()::create([
         'rent_id' => $rent->id,
        'lift' => $request->lift,
        'generator' => $request->generator,
        'guard' => $request->guard,
        'parking' => $request->parking,
        'gas' => $request->gas,
        'internet' => $request->internet
      ]);

      return $facility;
   }

   public function updateByRequest(RentRequest $request, $rent)
   {
      $facility = $rent->facility->update([
         'rent_id' => $rent->id,
         'lift' => $request->lift,
         'generator' => $request->generator,
         'guard' => $request->guard,
         'parking' => $request->parking,
         'gas' => $request->gas,
         'internet' => $request->internet
      ]);

      return $facility;
   }


}