<?php

namespace App\Repositories;

use App\Http\Requests\AdsRequest;
use App\Models\Ads;
use Illuminate\Support\Facades\Storage;

class AdsRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public function model()
    {
        return Ads::class;
    }

    private $path = 'ads';

    public function getNearestAds($latitude, $longitude)
    {
        $ads = $this->query()->get();
        
        $nearest = [];
        foreach ($ads as $ad) {
            $distance = getDistance([$latitude, $longitude], [$ad->latitude, $ad->longitude]);
            $nearest[(string) round($distance, 2)] = $ad;
        }
        ksort($nearest);

        $nearestAds = [];
        foreach ($nearest as $key => $ad) {
            if (!is_null($ad->ads_cover) && $key <= $ad->ads_cover) {
                $nearestAds[] = (object) $ad;
            }else{
                $nearestAds[] = (object) $ad;
            }

        }
        return $nearestAds;
    }

    public function storeByRequest(AdsRequest $request): Ads
    {
        $thumbnail = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = (new MediaRepository())->storeByRequest(
                $request->thumbnail,
                $this->path,
                'ads images',
                'image'
            );
        }

        return $this->create([
            'title' => $request->title,
            'media_id' => $thumbnail ? $thumbnail->id : null,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'area_cover' => $request->area_distance,
            'description' => $request->description,
        ]);
    }

    public function updateByRequest(AdsRequest $request, Ads $ads): Ads
    {
        $thumbnail = $this->thumbnailUpload($request, $ads);
        $ads->update([
            'title' => $request->title,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'area_cover' => $request->area_distance,
            'description' => $request->description,
            'media_id' => $thumbnail ? $thumbnail->id : $ads->media_id,
        ]);
        return $ads;
    }

    private function thumbnailUpload($request, Ads $ads)
    {
        $media = $ads->media;
        if ($request->hasFile('thumbnail')) {
            $media = (new MediaRepository())->updateOrCreateByRequest(
                $request->thumbnail,
                $this->path,
                'image',
                $media
            );
        }
        return $media;
    }

    public function destroy(Ads $ads){
        $media = $ads?->media;
        if ($media) {
            Storage::delete($media->src);
            $media->delete();
        }
        $ads->delete();
    }
}
