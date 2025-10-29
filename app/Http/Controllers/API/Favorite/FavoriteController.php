<?php

namespace App\Http\Controllers\API\Favorite;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use App\Models\Rent;
use App\Repositories\FavoriteRepository;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
   
    public function index()
    {
        $favorites = (new FavoriteRepository())->getFavorites();
        return $this->json('customer favorite list',[
            'favorites' => FavoriteResource::collection($favorites)
        ]);
    }

    public function favoriteToggle(Rent $rent)
    {
        $favorites = $rent->favorites;
        if ($favorites->isEmpty()) {
            $favorite = (new FavoriteRepository())->storeByRequest($rent->id);

            return $this->json('favorite is added successfully',[
                'favorites' => (new FavoriteResource($favorite))
            ]);
        }

        if ($favorites->isNotEmpty()) {
            foreach ($favorites as $favorite) {
                $favorite->delete();
            }
            return $this->json('favorite is removed successfully');
        }

        return $this->json('Sorry, Something was wrong',[], Response::HTTP_BAD_REQUEST);
    }
}
