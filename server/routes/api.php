<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOptionController;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class);
Route::apiResource('product-categories', ProductCategoryController::class);
Route::apiResource('options', OrderController::class);
Route::apiResource('option-categories', OrderController::class);
Route::apiResource('product-option', ProductOptionController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('carts', CartController::class);

//
Route::get('/homepage-images', [ProductController::class, 'getHomepageImages']);
Route::get('/options-of-product', [ProductOptionController::class, 'options_of_product']);
Route::get('/search', [FunctionController::class, 'product_search']);
Route::get('/count-cart', [FunctionController::class, 'count_cart']);
Route::get('/location-search', [FunctionController::class, 'location_search']);
Route::get('/reverse-geocode', [FunctionController::class, 'reverse_geocode']);



