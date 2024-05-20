<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variant extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function getImage()
    {
        if (!empty($this->image)) {
            return asset('storage/' . $this->image);
        } else {
            return asset('images/sksu.png');
        }
    }
}
