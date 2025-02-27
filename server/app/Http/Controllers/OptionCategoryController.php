<?php

namespace App\Http\Controllers;

use App\Models\OptionCategory;
use Illuminate\Http\Request;

class OptionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $optionCategories = OptionCategory::all();

        return response()->json($optionCategories, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $optionCategory = $request->all();

        OptionCategory::create($optionCategory);

        return response()->json($optionCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $optionCategory = OptionCategory::find($id);

        if (!$optionCategory) {
            return response()->json(['message' => 'Không tìm thấy danh mục tùy chọn'], 404);
        }

        return response()->json($optionCategory, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $optionCategory = OptionCategory::find($id);

        if (!$optionCategory) {
            return response()->json(['message' => 'Không tìm thấy danh mục tùy chọn'], 404);
        }

        $data = $request->all();

        $optionCategory->update($data);

        return response()->json($optionCategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $optionCategory = OptionCategory::find($id);

        if (!$optionCategory) {
            return response()->json(['message' => 'Không tìm thấy danh mục tùy chọn'], 404);
        }

        $optionCategory->delete();

        return response()->json(null, 204);
    }
}
