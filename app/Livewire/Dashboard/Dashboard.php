<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalPendingOrders = Order::where('status','pending')->count();
        $delivered = Order::where('status','receive')->count();
        return view('livewire.dashboard.dashboard',[
            'totalUsers'=> $totalUsers,
            'totalProducts'=> $totalProducts,
            'totalPendingOrders'=> $totalPendingOrders,
            'delivered'=> $delivered,
        ]);
    }
}
