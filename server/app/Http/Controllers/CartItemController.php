<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    //
    public function index(Request $request)
    {
        // $user_id = $request->query('user_id');
        //
        // $carts = Cart::with('product')->where('user_id', $user_id)->get();
        // $carts = CartItem::where('user_id', $user_id)->get();
        $cartItems = CartItem::all();
        return response()->json($cartItems);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $exists = CartItem::where('cart_id', $data["cart_id"])

            ->where('size_option_id', $data["size_option_id"])
            ->where('base_option_id', $data["base_option_id"])
            ->where('border_option_id', $data["border_option_id"])
            ->first();

        if ($exists) {

            $exists->quantity += $data["quantity"];
            // $exists->total += $cartItem["total"];
            $exists->save();

            return response()->json($exists);
        } else {

            $cartItem = CartItem::create($data);

            return response()->json($cartItem);
        }
    }
    public function show(string $cart_id) {}
}
