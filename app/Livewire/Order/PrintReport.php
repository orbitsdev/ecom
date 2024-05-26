<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class PrintReport extends Component
{

    public Order $record;
    public function render()
    {
        return view('livewire.order.print-report');
    }
}
