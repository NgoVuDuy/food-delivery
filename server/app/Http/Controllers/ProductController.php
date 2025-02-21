<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

// 200 thanh cong va khong co du lieu tra ve
// 200 thanh cong nhung khong co du lieu tra ve
// 201 tao tai nguyen moi thanh cong

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Product::paginate(5);
        $user = Product::all();
        
        return response()->json($user) ;

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->all();

        Product::create($product);

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::find($id);

        return response()->json($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();

        $product = Product::find($id);

        $product -> update($data);

        return response()->json($product);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);

        $product->delete();

        return response()->json(null);

    }
}
