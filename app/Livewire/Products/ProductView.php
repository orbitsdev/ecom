<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductView extends Component
{   

    
    public Product $record;
    public function render()
    {
        return view('livewire.products.product-view');
    }
}
