<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    //
    public function index() {
        $orderItems = OrderItem::all();

        return response()->json($orderItems);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $order_item = OrderItem::create($data);

        return response()->json($order_item);
    }
}
