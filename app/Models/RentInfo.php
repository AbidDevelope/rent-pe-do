<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentInfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rent()
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    //------------ Attributes
    public function getCityNameAttribute()
    {
        return $this->city->name;   
    }
}
