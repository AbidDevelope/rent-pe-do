<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Rent extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    //-------------Relations
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function medias()
    {
        return $this->belongsToMany(Media::class, (new RentThumbnail())->getTable(), 'rent_id', 'media_id');
    }

    public function cost()
    {
        return $this->hasOne(Cost::class);
    }

    public function facility()
    {
        return $this->hasOne(Facility::class);
    }

    public function rentInfo()
    {
        return $this->hasOne(RentInfo::class);
    }

    public function religion()
    {
        return $this->hasOne(Religion::class);
    }

    public function forRent()
    {
        return $this->hasOne(ForRent::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getCityNameAttribute()
    {
        return $this->rentInfo->city->name;   
    }

    public function getThumbnailsAttribute()
    {
        $thumbnails = collect([]);

        foreach($this->medias as $media){
            $thumbnails[] = [
                'id' => $media->id,
                'name' => $media->name,
                'path' => $media->path,
                'src' => Storage::exists($media->src) ? Storage::url($media->src) : asset('images/dummy/dummy-placeholder.png'),
            ];
        }

        return $thumbnails;
    }
    
    //---------------- Scope
    public function scopeIsActive(Builder $builder, bool $value = true)
    {
        return $builder->where('is_active', $value);
    }
}
