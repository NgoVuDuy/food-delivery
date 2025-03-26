<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\DishDetail;
use App\Livewire\ErrorPayment;
use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use App\Livewire\Promotion;
use App\Livewire\Search;
use App\Livewire\News;
use App\Livewire\Staff\Cancelled;
use App\Livewire\Staff\Completed;
use App\Livewire\Staff\Delivering;
use App\Livewire\Staff\Preparing;
use App\Livewire\Staff\OrderManagement;
use App\Livewire\Staff\Pending;
use App\Livewire\Staff\Ready;
use App\Livewire\StoreLocation;
use App\Livewire\SuccessPayment;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', Home::class);
Route::get('/menu', Menu::class);
Route::get('/cart', Cart::class);
Route::get('/store-locations', StoreLocation::class);
Route::get('/dish-details/{id}', DishDetail::class)->name('dish-details');
Route::get('/orders/{id}', Order::class);
Route::get('/search', Search::class);
Route::get('/checkout', Checkout::class);
Route::get('/promotion', Promotion::class);
Route::get('/news', News::class);

Route::get('/success', SuccessPayment::class);
Route::get('/error', ErrorPayment::class);


// Staff
Route::get('/order-mng', OrderManagement::class);
Route::get('/pending', Pending::class);
Route::get('/preparing', Preparing::class);
Route::get('/ready', Ready::class);
Route::get('/delivering', Delivering::class);
Route::get('/completed', Completed::class);
Route::get('/cancelled', Cancelled::class);

