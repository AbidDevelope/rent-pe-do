<?php

namespace App\Repositories;

use App\Http\Requests\FavoriteRequest;
use App\Models\Favorite;

class FavoriteRepository extends Repository
{
   public function model()
   {
    return Favorite::class;
   }

   public function getFavorites()
   {
       $customer = auth()->user()->customer;
       return $customer->favorites()->latest()->get();
   }

   public function storeByRequest($id): Favorite
   {
       $customer = auth()->user()->customer;
       $favorite = $this->model()::create([
           'customer_id' => $customer->id,
           'rent_id' => $id
       ]);
       return $favorite;
   }

   public function findById($id)
   {
       return $this->model()::find($id);
   }

}