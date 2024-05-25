<?php

use App\Livewire\ClientDashboard;
use App\Livewire\Users\ListUsers;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\EditProduct;
use App\Livewire\Products\ProductView;
use App\Livewire\Products\ListProducts;
use App\Livewire\Products\CreateProduct;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    
    // Route::get('/dashboard',  function(){
    //     return redirect()->route('user.index');
    // })->name('dashboard');

       
    Route::get('/dashboard',  function(){
        if(Auth::user()->role === 'Admin'){
            return redirect()->route('admin-dashboard');
        }else{
            
            return redirect()->route('client-dashboard');
        }
    })->name('dashboard');
   
   

    Route::middleware(['can:is-client'])->group(function () {
        Route::get('/client-dashboard',  ClientDashboard::class)->name('client-dashboard');
    });
    
    Route::middleware(['can:is-admin'])->group(function () {
        Route::get('/admin-dashboard',  Dashboard::class)->name('admin-dashboard');
        Route::prefix('/user')->name('user.')->group(function () {

            Route::get('/lists', ListUsers::class)->name('index');
            // Route::get('create', CreateProduct::class)->name('create');
            // Route::get('create/{record}', EditProduct::class)->name('edit');
        });
        Route::prefix('/product')->name('product.')->group(function () {
            Route::get('list', ListProducts::class)->name('index');
            Route::get('create', CreateProduct::class)->name('create');
            Route::get('create/{record}', EditProduct::class)->name('edit');
            Route::get('view/{record}', ProductView::class)->name('view');
        });
    });
   
});
