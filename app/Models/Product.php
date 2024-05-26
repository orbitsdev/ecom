<?php

namespace App\Models;

use App\Models\File;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function getLowestPrice()
    {
        return $this->variants()->min('price');
    }

 
    public function getHighestPrice()
    {
        return $this->variants()->max('price');
    }


    public function getImage()
    {
        if (!empty($this->image)) {
            return Storage::disk('public')->url($this->image);
        } else {
            return asset('images/placeholder.png');
        }
    }

    public function getStatusText(){
        return $this->active === true ? 'Active' : 'Inactive';
    }
   

   
}
