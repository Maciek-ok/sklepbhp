<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
    public function firstPhoto()
    {
        return $this->photos->first();
    }

}
