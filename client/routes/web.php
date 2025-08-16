<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\DishDetail;
use App\Livewire\ErrorOrder;
use App\Livewire\ErrorPayment;
use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use App\Livewire\Promotion;
use App\Livewire\Search;
use App\Livewire\News;
use App\Livewire\ProductImage;
use App\Livewire\Staff\Cancelled;
use App\Livewire\Staff\Completed;
use App\Livewire\Staff\Delivering;
use App\Livewire\Staff\Preparing;
use App\Livewire\Staff\OrderManagement;
use App\Livewire\Staff\Pending;
use App\Livewire\Staff\Ready;
use App\Livewire\Staff\ShipperOrder;
use App\Livewire\StoreLocation;
use App\Livewire\SuccessOrder;
use App\Livewire\SuccessPayment;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', Home::class);
Route::get('/menu', Menu::class);
Route::get('/store-locations', StoreLocation::class);
Route::get('/dish-details/{id}', DishDetail::class)->name('dish-details');
Route::get('/search', Search::class);
Route::get('/promotion', Promotion::class);
Route::get('/news', News::class);
Route::get('/product-images', ProductImage::class);

Route::middleware(['role:user'])->group(function() {

    Route::get('/cart', Cart::class);
    
    Route::get('/checkout', Checkout::class);
    Route::get('/orders/{id}', Order::class);
    
    Route::get('/success', SuccessPayment::class);
    Route::get('/error', ErrorPayment::class);

    Route::get('/success-order', SuccessOrder::class);
    Route::get('/error-order', ErrorOrder::class);
});


//shippers
Route::middleware(['role:shipper'])->group(function() {

    Route::get('/shipper-orders', ShipperOrder::class); // chỉ cho shipper vô
});

// cho cả shipper và staff
Route::middleware(['role:not_user'])->group(function() {

    Route::get('/order-mng', OrderManagement::class);
    Route::get('/pending', Pending::class);
    Route::get('/preparing', Preparing::class);
    Route::get('/ready', Ready::class);
    Route::get('/delivering', Delivering::class);
    Route::get('/completed', Completed::class);
    Route::get('/cancelled', Cancelled::class);
});

