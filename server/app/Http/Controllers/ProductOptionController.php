<?php

namespace App\Http\Controllers;

use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productOption = ProductOption::all();

        return response()->json($productOption, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $productOption = $request->all();

        ProductOption::create($productOption);

        return response()->json($productOption, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $productOption = ProductOption::find($id);

        if(!$productOption) {
            return response()->json(['message' => 'Không tìm thấy lựa chọn'], 404);
        }

        return response()->json($productOption, 200);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $productOption = ProductOption::find($id);

        if(!$productOption) {
            return response()->json(['message' => 'Không tìm thấy lựa chọn'], 404);
        }

        $data = $request->all();
        $productOption -> update($data);
        return response()->json($productOption, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $productOption = ProductOption::find($id);

        if(!$productOption) {
            return response()->json(['message' => 'Không tìm thấy lựa chọn'], 404);
        }

        $productOption -> delete();

        return response() -> json(null, 204);
    }
}
