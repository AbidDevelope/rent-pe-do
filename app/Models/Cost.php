<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rent()
    {
        return $this->belongsTo(Rent::class, 'rent_id','id')->withTrashed();
    }
}
