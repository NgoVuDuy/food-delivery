<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->query('user_id');
        //
        $carts = Cart::with('user')
            ->with('cartItems.product')
            ->with('cartItems.sizeOption')
            ->with('cartItems.baseOption')
            ->with('cartItems.borderOption')

            ->where('user_id', $user_id)->first();

        // return response()->json($carts);


        return response()->json(new CartResource($carts));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $cart = Cart::where('user_id', $data['user_id'])->first();

        if ($cart) {
            return response()->json($cart);
        }

        $new_cart = Cart::create($data);
        return response()->json($new_cart);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        return response()->json($cart, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        $data = $request->all();

        $cart->update($data);

        return response()->json($cart, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cart = Cart::find($id);

        if (!$cart) {
            return response()->json(['message' => 'Không tìm thấy tùy chọn'], 404);
        }

        $cart->delete();

        return response()->json(null, 204);
    }
}
