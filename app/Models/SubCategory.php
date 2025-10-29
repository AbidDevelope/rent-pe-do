<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = [
        'category_id', 'name', 'image', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
