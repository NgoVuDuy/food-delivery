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
        ->with('cartItems.product')

        ->where('user_id', $user_id)->get();

        // return response()->json($carts);


        return response()->json(CartResource::collection($carts));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $cart = Cart::create($data);

        // $exists = Cart::where('product_id', $cart["product_id"])

        //     ->where('size', $cart["size"])
        //     ->where('base', $cart["base"])
        //     ->where('border', $cart["border"])
        //     ->first();

        // if ($exists) {

        //     $exists->quantity += $cart["quantity"];
        //     $exists->total += $cart["total"];
        //     $exists->save();
        // } else {

        //     Cart::create($cart);
        // }

        return response()->json($cart);
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
