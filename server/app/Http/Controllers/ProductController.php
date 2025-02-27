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
        
        return response()->json($user, 200) ;

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->all();

        Product::create($product);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::find($id);

        if(!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        return response()->json($product, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $product = Product::find($id);

        if(!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        $data = $request->all();
        $product -> update($data);

        return response()->json($product, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);

        if(!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        $product->delete();

        return response()->json(null, 204);

    }
}
