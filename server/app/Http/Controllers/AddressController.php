<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $user_id = $request->query('user_id');

        $addresses = Address::where('user_id', $user_id)->get();

        return response()->json($addresses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lấy dữ liệu cần thiết từ request
        $data = $request->only([
            'user_id',
            'customer_name',
            'customer_phone',
            'place_name',
            'place_id',
            'lat',
            'lng'
        ]);

        // Tạo mới hoặc cập nhật địa chỉ
        $address = Address::updateOrCreate(['user_id' => $data['user_id']], $data);

        // Trả về JSON phản hồi
        return response()->json($address);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
