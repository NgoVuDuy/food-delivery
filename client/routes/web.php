<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Cart;
use App\Livewire\DishDetail;
use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use App\Livewire\Search;
use App\Livewire\StoreLocation;


Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', Home::class);
Route::get('/menu', Menu::class);
Route::get('/cart', Cart::class);
Route::get('/store-location', StoreLocation::class);
Route::get('/dish-details/{id}', DishDetail::class)->name('dish-details');
Route::get('/order', Order::class);
Route::get('/search', Search::class);


Route::controller(PaymentController::class)->group(function() {
    Route::post('/payment', 'payment');
});
