<?php

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
Route::apiResource('product_categories', ProductCategoryController::class);
Route::apiResource('options', OrderController::class);
Route::apiResource('option_categories', OrderController::class);
Route::apiResource('product_option', ProductOptionController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('carts', OrderController::class);

