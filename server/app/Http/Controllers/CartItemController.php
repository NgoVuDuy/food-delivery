<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    //
    public function index(Request $request)
    {

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

            $exists->save();

            return response()->json($exists);
        } else {

            $cartItem = CartItem::create($data);

            return response()->json($cartItem);
        }
    }

    public function show(string $cart_id) {

    }

    public function update(Request $request, string $id) {

        $quantity = $request -> input('quantity');
        $total = $request -> input("total");

        $cart_item = CartItem::find($id);

        if(!$cart_item) {

            
            return;
        }

        $cart_item->quantity = (int) $quantity;
        $cart_item->total = $total;

        $cart_item->save();

        return $cart_item;
    }

    public function destroy(string $id) {

        $cart_items = CartItem::find($id);

        if (!$cart_items) {
            return response()->json(['message' => 'Không tìm thấy tùy chọn'], 404);
        }

        $cart_items->delete();

        return response()->json(null, 204);
    }
}
