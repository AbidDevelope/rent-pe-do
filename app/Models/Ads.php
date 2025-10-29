<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ads extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function getThumbnailAttribute()
    {
        $media = $this->media;
        if ($media && Storage::exists($media->src)) {
            return Storage::url($media->src);
        }
        return asset('images/dummy/dummy-placeholder.png');
    }
}
