<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::with('shipper')
        ->with('staff')
        ->get();
        
        return response()->json($users, 201);
    }

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

    public function show(string $id)
    {
        //
        $user = User::with('shipper')->find($id);
        // $user = $this->userService->getUserById($id);

        return response()->json($user);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
