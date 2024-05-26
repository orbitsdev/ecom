<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderCount extends Component
{
    public function render()
    {   
        $orders_count= Auth::user()->orders->where('status','prepairing')->count();
        return view('livewire.order-count',[
            'orders_count' =>$orders_count
        ]);
    }
}
