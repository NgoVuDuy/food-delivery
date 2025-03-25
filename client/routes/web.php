<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\DishDetail;
use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use App\Livewire\Promotion;
use App\Livewire\Search;
use App\Livewire\News;
use App\Livewire\Staff\Preparing;
use App\Livewire\Staff\OrderManagement;
use App\Livewire\Staff\Pending;
use App\Livewire\StoreLocation;


Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', Home::class);
Route::get('/menu', Menu::class);
Route::get('/cart', Cart::class);
Route::get('/store-locations', StoreLocation::class);
Route::get('/dish-details/{id}', DishDetail::class)->name('dish-details');
Route::get('/order', Order::class);
Route::get('/search', Search::class);
Route::get('/checkout', Checkout::class);
Route::get('/promotion', Promotion::class);
Route::get('/news', News::class);

Route::get('/order-mng', OrderManagement::class);
Route::get('/pending', Pending::class);
Route::get('/preparing', Preparing::class);



