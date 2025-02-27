<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Cart;
use App\Livewire\DishDetail;
use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Order;
use App\Livewire\StoreLocation;


Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', Home::class);
Route::get('/menu', Menu::class);
Route::get('/cart', Cart::class);
Route::get('/store-location', StoreLocation::class);
Route::get('/menu/1', DishDetail::class);
Route::get('/order', Order::class);


Route::controller(TestController::class)->group(function() {
    Route::get('/getapi', 'getAPI');
});

Route::controller(PaymentController::class)->group(function() {
    Route::post('/payment', 'payment');
});
