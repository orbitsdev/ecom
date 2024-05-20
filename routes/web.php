<?php

use App\Livewire\Products\CreateProduct;
use App\Livewire\Products\EditProduct;
use App\Livewire\Products\ListProducts;
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
    Route::get('/dashboard', function () {
        return redirect()->route('product.index');
    })->name('dashboard');


    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('product-list', ListProducts::class)->name('index');
        Route::get('create', CreateProduct::class)->name('create');
        Route::get('create/{record}', EditProduct::class)->name('edit');
    });
});
