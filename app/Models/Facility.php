<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rent()
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }
}
