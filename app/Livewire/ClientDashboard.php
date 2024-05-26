<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ClientDashboard extends Component
{
    public function render()
    {   

        $products = Product::where('active', true)->whereHas('variants')->paginate(10);
    
        return view('livewire.client-dashboard', [
            'products'=> $products
        ]);
    }
}
