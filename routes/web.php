<?php

use App\Livewire\ClientDashboard;
use App\Livewire\Orders\ListsRecieveOrders;
use App\Livewire\Users\ListUsers;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Order\ListOrderReived;
use App\Livewire\Order\PrintReport;
use App\Livewire\Order\UserOrderList;
use App\Livewire\Orders\EditOrder;
use App\Livewire\Orders\ListOrders;
use App\Livewire\Orders\ManageOrder;
use App\Livewire\Orders\OrderSummary;
use App\Livewire\Orders\ToShip;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products\EditProduct;
use App\Livewire\Products\ProductView;
use App\Livewire\Products\ListProducts;
use App\Livewire\Products\CreateProduct;
use App\Livewire\Products\VariantionSelection;

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
    return redirect()->route('login');
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
   
   
    Route::get('/report/order/{record}',  PrintReport::class)->name('print-order');
    Route::middleware(['can:is-client'])->group(function () {
        Route::get('/shop',  ClientDashboard::class)->name('client-dashboard');
        Route::get('/shop/product/{record}/variations',  VariantionSelection::class)->name('variation-selection');
        Route::get('/shop/orders/',  UserOrderList::class)->name('order-list');
        Route::get('/shop/orders/checkout/{record}',  EditOrder::class)->name('order.edit');
        Route::get('/shop/to-ship/',  ToShip::class)->name('to-ship-list');
        Route::get('/shop/order/summary/{record}',  OrderSummary::class)->name('order.summary');
        Route::get('/shop/order/history/',  ListOrderReived::class)->name('order.receive');
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
        
        
        Route::prefix('/admin-orders')->name('order-manage.')->group(function () {
            Route::get('orders', ListOrders::class)->name('index');
            Route::get('order/manage/{record}', ManageOrder::class)->name('edit');
            Route::get('orders/receive', ListsRecieveOrders::class)->name('receive-orders');
         
        });
    });
   
});
