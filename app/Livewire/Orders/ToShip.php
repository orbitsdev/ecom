<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ToShip extends Component
{
    public function render()
    {

        $orders = Auth::user()->orders()->latest()->whereIn('status',['pending','accepted'])->get();
        return view('livewire.orders.to-ship',[
            'orders'=> $orders
        ]);
    }
}
