<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // ----------------- Relations
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function devices()
    {
        return $this->hasMany(DeviceKey::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    //---------------- Attributes
    public function getNameAttribute()
    {
        return $this->user->first_name . ' ' . $this->user->last_name;
    }
}
