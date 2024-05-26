<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ToShipCount extends Component
{
    public function render()
    {   

        $orders_count= Auth::user()->orders->whereIn('status',['pending','accepted'])->count();

        
        return view('livewire.orders.to-ship-count',[
            'orders_count' =>$orders_count
        ]);
    }
}
