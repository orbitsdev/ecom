<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use App\Models\Product;
use App\Models\Logistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function  items (){
        return $this->hasMany(Item::class);
    }
    public function  logistics (){
        return $this->hasMany(Logistic::class);
    }



    public function proffOfPayment()
    {
        if (!empty($this->proof_of_payment)) {
            return Storage::disk('public')->url($this->proof_of_payment);
        } else {
            return asset('images/placeholder.png');
        }
    }

    public function totalSummary(){
        return $this->items->sum(function($item){
            return $item->itemPrice();
        });
    }
}
