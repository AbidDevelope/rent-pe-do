<?php

namespace App\Repositories;

use App\Models\ForRent;

class ForRentRepository extends Repository
{
  public function model()
  {
    return ForRent::class;
  }

  public function storeByRequest($request, $rent): ForRent
  {
    $for_rent = $this->create([
      'rent_id' => $rent->id,
      'male_student' => $request->male_student,
      'female_student' => $request->female_student,
      'man_job' => $request->man_job,
      'women_job' => $request->women_job,
      'businessman' => $request->businessman,
      'any' => $request->any
    ]);

    return $for_rent;
  }

  public function updateByRequest($request, $rent)
  {
    return $rent->forRent->update([
      'rent_id' => $rent->id,
      'male_student' => $request->male_student,
      'female_student' => $request->female_student,
      'man_job' => $request->man_job,
      'women_job' => $request->women_job,
      'businessman' => $request->businessman,
      'any' => $request->any
    ]);
  }
}
