<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::with('shipper')
        ->with('staff')
        ->get();
        
        return response()->json($users, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = $request->all();

        if(User::where('phone', $user["phone"])->exists()) {

            return response()->json(["message" => "Số điện thoại đã được sử dụng", "code" => 0]);

        } else {

            $success = User::create($user);
    
            if($success) {
    
                return response()->json(["message" => "Tạo tài khoản thành công", "code" => 1]);
            } else {
                return response()->json(["message" => "Tạo tài khoản thất bại", "code" => 0]);
    
            }
        }

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::with('shipper')->find($id);

        return response()->json($user);
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
