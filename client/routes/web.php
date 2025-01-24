<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(TestController::class)->group(function() {


    Route::get('/getapi', 'getApi');
});

Route::get('/menu', function() {

    return view('menu');
});

Route::get('/menu/1', function() {

    return view('dish-details');
});

Route::get('/cart', function() {

    return view('cart');
});

Route::get('location', function() {
    return view('location');
});