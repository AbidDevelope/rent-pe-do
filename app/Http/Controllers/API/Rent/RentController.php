<?php

namespace App\Http\Controllers\API\Rent;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentRequest;
use App\Http\Resources\RentResource;
use App\Models\AppSetting;
use App\Models\Rent;
use App\Repositories\AdsRepository;
use App\Repositories\RentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class RentController extends Controller
{

    public function index(Request $request)
    {
        $setting = AppSetting::first();
        $adsCount = $setting?->ads_count ?? 2; //2
        $adsShow = $setting?->ads_show ?? true; 

        $rents = (new RentRepository())->getAll();
        $allAds = (new AdsRepository())->getAll();

        $rentsAndAds = [];
        $rentCounter = 1;
        $adsIndex = 0;

        foreach ($rents as $rent) {
            if ($adsShow  && ($rentCounter == $adsCount)) {
                if ($adsIndex < count($allAds)) {
                    $rent['ads'] = [
                        'id' => $allAds[$adsIndex]->id,
                        'title' => $allAds[$adsIndex]->title,
                        'thumbnail' => $allAds[$adsIndex]->thumbnail
                    ];
                    $adsIndex++;
                }
                $rentCounter = 0;
            } else {
                $rent['ads'] = null;
            }

            $rentCounter++;

            $rentsAndAds[] = $rent;
        }

        return $this->json('Rent list', [
            'rents' => RentResource::collection($rentsAndAds)
        ]);
    }

    public function show($id)
    {
        $rent = (new RentRepository())->findById($id);
        return $this->json('rent details', [
            'rent' => (new RentResource($rent))
        ]);
    }

    public function store(RentRequest $request)
    {
        $rent = (new RentRepository())->storeByRequest($request);
        return $this->json('Post Added successfully', [
            'posts' => (new RentResource($rent))
        ]);
    }

    public function update(RentRequest $request, Rent $rent)
    {
        $rent = (new RentRepository())->updateByRequest($request, $rent);
        return $this->json('Post updated successfully', [
            'posts' => (new RentResource($rent))
        ]);
    }

    public function myPosts()
    {
        $customer = auth()->user()->customer;
        $posts = $customer->rents()->latest()->get();
        return $this->json('My posts', [
            'posts' => RentResource::collection($posts)
        ]);
    }

    public function rentType()
    {
        $type = config('enums.rent_types');
        return $this->json('Rent Type', [
            'type' => $type
        ]);
    }

    public function toggleStatus(Rent $rent)
    {
        $rent = (new RentRepository())->updateStatusById($rent);
        return $this->json('active status change successfully', [
            'rent' => (new RentResource($rent))
        ]);
    }

    public function destroy(Rent $rent)
    {
        if ($rent) {
            $thumbnails = $rent->thumbnails;

            foreach ($thumbnails as $thumbnail) {
                if (Storage::exists($thumbnail['path'])) {
                    Storage::delete($thumbnail['path']);
                }
            }

            $rent->delete();

            return $this->json('Post is deleted successfully');
        }
        return $this->json('Sorry, Something was wrong', [], Response::HTTP_BAD_REQUEST);
    }
}
