<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Http\Resources\AdsResource;
use App\Models\Ads;
use App\Repositories\AdsRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function __construct(
        protected AdsRepository $adsRepository
    ) {
    }

    public function index()
    {
        $ads = auth()->user()->ads;
        return $this->json('Ads List', [
            'ads' => AdsResource::collection($ads),
        ]);
    }

    public function store(AdsRequest $request)
    {
        $userSubscription = $this->checkHasValidSubscription(auth()->user());

        if ($userSubscription && ($userSubscription?->available_ads > 0)) {

            $ads = $this->adsRepository->storeByRequest($request, $userSubscription->expiry_date);
            $userSubscription->update([
                'available_ads' => $userSubscription->available_ads - 1,
            ]);

            return $this->json('Ads Created Successfully', [
                'ads' => AdsResource::make($ads),
            ]);

        } elseif ($userSubscription && ($userSubscription?->available_ads == 0)) {
            return $this->json('sorry you have no more ads', [], Response::HTTP_BAD_REQUEST);
        }

        return $this->json('No Subscription Found', [], Response::HTTP_BAD_REQUEST);
    }

    public function update(AdsRequest $request, Ads $ads)
    {
        $ads = $this->adsRepository->updateByRequest($request, $ads);
        return $this->json('Ads Updated Successfully', [
            'ads' => AdsResource::make($ads),
        ]);
    }

    public function destroy(Ads $ads)
    {
        $media = $ads->media;
        $ads->delete();
        if ($media) {
            Storage::delete($media->src);
            $media->delete();
        }
        return $this->json('Ads Deleted Successfully');
    }

    private function checkHasValidSubscription($user)
    {
        return $user->subscriptions()
            ->where('payment_status', true)
            ->where('expiry_date', '>', now())
            ->latest()->first();
    }
}
