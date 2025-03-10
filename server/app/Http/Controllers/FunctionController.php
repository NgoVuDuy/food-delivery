<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class FunctionController extends Controller
{
    //
    public function product_search(Request $request) {

        $product_name = $request->query('product_name');

        $products = Product::where('name', 'LIKE', "%$product_name%")->get();

        return response()->json($products);
    }

    public function count_cart() {

        $carts = Cart::with('product')->get();

        $count_cart = count($carts);

        return response()->json($count_cart);

    }
}
