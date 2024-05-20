<?php

namespace App\Livewire\Dashboard;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        
        $totalUsers = User::count();
        $totalProducts = Product::count();
        return view('livewire.dashboard.dashboard',['totalUsers'=> $totalUsers, 'totalProducts'=> $totalProducts]);
    }
}
