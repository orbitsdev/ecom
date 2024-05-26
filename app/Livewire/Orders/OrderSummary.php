<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderSummary extends Component
{   

    public Order $record;
    public function render()
    {
        return view('livewire.orders.order-summary');
    }
}
