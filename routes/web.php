<?php

use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Products\CreateProduct;
use App\Livewire\Products\EditProduct;
use App\Livewire\Products\ListProducts;
use App\Livewire\Products\ProductView;
use App\Livewire\Users\ListUsers;
use Illuminate\Support\Facades\Route;

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

    Route::middleware(['can:is-admin'])->group(function () {
        Route::get('/dashboard',  Dashboard::class)->name('dashboard');
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
