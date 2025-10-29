<?php

namespace App\Repositories;

use App\Models\Religion;

class ReligionRepository extends Repository
{
  public function model()
  {
    return Religion::class;
  }

  public function storeByRequest($request, $rent): Religion
  {
    $religion = $this->model()::create([
      'rent_id' => $rent->id,
      'islam' => $request->islam,
      'hindu' => $request->hindu,
      'christian' => $request->christian,
      'bouddho' => $request->bouddho,
      'any' => $request->any_religion
    ]);
    return $religion;
  }

  public function updateByRequest($request, $rent)
  {
    return  $rent->religion->update([
      'rent_id' => $rent->id,
      'islam' => $request->islam,
      'hindu' => $request->hindu,
      'christian' => $request->christian,
      'bouddho' => $request->bouddho,
      'any' => $request->any_religion
    ]);
  }
}
