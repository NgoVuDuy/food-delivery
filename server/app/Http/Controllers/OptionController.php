<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $option = Option::all();

        return response()->json($option, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $option = $request->all();

        Option::create($option, 201);

        return response()->json($option, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $option = Option::find($id);

        if (!$option) {
            return response()->json(['message' => 'Không tìm thấy tùy chọn'], 404);
        }

        return response()->json($option, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $option = Option::find($id);

        if (!$option) {
            return response()->json(['message' => 'Không tìm thấy tùy chọn'], 404);
        }

        $data = $request->all();

        $option->update($data);

        return response()->json($option, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        $option = Option::find($id);

        if (!$option) {
            return response()->json(['message' => 'Không tìm thấy tùy chọn'], 404);
        }

        $option->delete();

        return response()->json(null, 204);
    }
}
