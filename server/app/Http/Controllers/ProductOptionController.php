<?php

namespace App\Http\Controllers;

use App\Models\OptionCategory;
use App\Models\ProductOption;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductOptionController extends Controller
{

    // Trả về các lựa chọn cho 1 sản phẩm
    public function options_of_product(Request $request) {

        $product_id = $request->query('product_id');
        $option_category_name = $request->query('option_category_name');

        $product = Product::find($product_id);

        $option_category = OptionCategory::where('name', $option_category_name)->first();

        $options = $product->options;

        $results = $options->where('option_categories_id', $option_category->id)->values();

        return response()->json($results);
    }
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
