<?php

namespace App\Repositories;

use App\Models\Media;
use App\Models\RentThumbnail;

class RentThumbnailRepository extends Repository
{
   private $path = 'images/posts/';
   public function model()
   {
      return RentThumbnail::class;
   }

   public function storeByRequest($request, $rent)
   {
      $thumbnail = null;
      if (!empty($request->feature_image)) {
         foreach ($request->feature_image as $feature_image) {
            if ($request->hasFile('feature_image')) {
               $thumbnail = (new MediaRepository())->storeByRequest(
                  $feature_image,
                  $this->path,
                  'post image',
                  'image'
               );
               $this->model()::create([
                  'rent_id' => $rent->id,
                  'media_id' => $thumbnail->id
               ]);
            }
         }
      }
      return $thumbnail;
   }

   public function updateByRequest($request, $rent)
   {
      $thumbnail = null;
      if (!empty($request->feature_image)) {
         foreach ($request->feature_image as $feature_image) {
            $media = Media::find($feature_image['id']);
            if ($feature_image['file']) {
               $thumbnail = (new MediaRepository())->updateOrCreateByRequest(
                  $feature_image['file'],
                  $this->path,
                  'image',
                  $media
               );
               $this->model()::updateOrCreate(
                  [
                     'media_id' => $thumbnail->id
                  ],
                  [
                     'rent_id' => $rent->id,
                  ]
               );
            }
         }
      }
      return $thumbnail;
   }
}
