<?php

namespace App\Repositories;

use App\Http\Requests\AreaAdminRequest;
use App\Models\Currency;

class CurrencyRepository extends Repository
{
   public function model()
   {
    return Currency::class;
   }

   public function getCurrency()
   {
      return $this->model()::first();
   }

   public function updateOrCreateByRequest($request): Currency
   {
      $currency = $this->getCurrency();
      return  $this->model()::updateOrCreate([
            'id' => $currency ? $currency->id : 0
        ],[
            'symbol' => $request->symbol
        ]);
   }


}