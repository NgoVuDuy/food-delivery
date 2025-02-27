<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productCategory = ProductCategory::all();

        return response()->json($productCategory, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $productCategory = $request->all();

        ProductCategory::create($productCategory);

        return response()->json($productCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $productCategory = ProductCategory::find($id);

        if(!$productCategory) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
        }

        return response()->json($productCategory, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $productCategory = ProductCategory::find($id);

        if(!$productCategory) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
        }

        $data = $request->all();
        $productCategory -> update($data);

        return response()->json($productCategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $productCategory = ProductCategory::find($id);

        if(!$productCategory) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
        }

        $productCategory -> delete();

        return response()->json(null, 204);
    }
}
