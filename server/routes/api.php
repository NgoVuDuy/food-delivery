<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\OptionCategoryController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOptionController;
use App\Http\Controllers\StoreLocationController;
use App\Http\Controllers\UserController;

use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class);
Route::apiResource('product-categories', ProductCategoryController::class);
Route::apiResource('options', OptionController::class);
Route::apiResource('option-categories', OptionCategoryController::class);
Route::apiResource('product-option', ProductOptionController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-items', OrderItemController::class);

Route::apiResource('carts', CartController::class);
Route::apiResource('cart-items', CartItemController::class);

Route::apiResource('users', UserController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('addresses', AddressController::class);
Route::apiResource('store-locations', StoreLocationController::class);


//
Route::get('/options-of-product', [ProductOptionController::class, 'options_of_product']);
Route::get('/search', [FunctionController::class, 'product_search']);
Route::get('/count-cart', [FunctionController::class, 'count_cart']);
Route::get('/location-search', [FunctionController::class, 'location_search']);
Route::get('/reverse-geocode', [FunctionController::class, 'reverse_geocode']);
Route::get('/category', [FunctionController::class, 'category']);
// Route::get('/store-locations', [FunctionController::class, 'store_location']);
Route::get('/directions', [FunctionController::class, 'directions']);
Route::get('/typical-products', [FunctionController::class, 'typical_products']);
Route::post('/login', [FunctionController::class, 'login']);
Route::get('/place-details', [FunctionController::class, 'place_details']);
Route::get('/payment/callback', [FunctionController::class, 'vnpayCallBack'])->name('vnpay.callback');








