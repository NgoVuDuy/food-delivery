<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status', null);
        $shipper_id =  $request->query('shipper_id', null);
        $user_id = $request->query('user_id', null);

        // lấy ra tất cả các đơn orders
        if ($status == null  && $shipper_id == null) {

            $order = Order::with('storeLocation')
                ->with('payment')
                ->with('shipper.user')
                ->with('orderItems.product')
                ->with('orderItems.sizeOption')
                ->with('orderItems.baseOption')
                ->with('orderItems.borderOption')
                ->orderBy('created_at', 'desc')
                ->get();
        } else
            // Lấy ra các đơn order tương ứng với trạng thái

            if ($status != null && $shipper_id == null) {
                $order = Order::with('storeLocation')
                    ->with('payment')
                    ->with('shipper.user')
                    ->with('orderItems.product')
                    ->with('orderItems.sizeOption')
                    ->with('orderItems.baseOption')
                    ->with('orderItems.borderOption')
                    ->where('status', $status)
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else

                // Lấy ra các đơn tương ứng với id shipper
                if ($status == null && $shipper_id != null) {
                    $order = Order::with('storeLocation')
                        ->with('payment')
                        ->with('shipper.user')
                        ->with('orderItems.product')
                        ->with('orderItems.sizeOption')
                        ->with('orderItems.baseOption')
                        ->with('orderItems.borderOption')
                        ->where('shipper_id', $shipper_id)
                        ->orderBy('created_at', 'desc')
                        ->get();
                } else

                    //  
                    $order = Order::with('storeLocation')
                        ->with('payment')
                        ->with('shipper.user')
                        ->with('orderItems.product')
                        ->with('orderItems.sizeOption')
                        ->with('orderItems.baseOption')
                        ->with('orderItems.borderOption')
                        ->where('shipper_id', $shipper_id)
                        ->where('status', $status)
                        ->orderBy('created_at', 'desc')
                        ->get();

        if ($user_id != null) {
            $order = Order::with('storeLocation')
                ->with('payment')
                ->with('shipper.user')
                ->with('orderItems.product')
                ->with('orderItems.sizeOption')
                ->with('orderItems.baseOption')
                ->with('orderItems.borderOption')
                ->where('user_id', $user_id)
                ->whereNot('status', 'completed')
                ->whereNot('status', 'cancelled')

                ->orderBy('created_at', 'desc')
                ->get();
        }

        return response()->json([
            "orders" => OrderResource::collection($order),
            "count" => $order->count(),

        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $order = Order::create($data);

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $order = Order::with('storeLocation')
            ->with('payment')
            ->with('shipper.user')
            ->with('orderItems.product')
            ->with('orderItems.sizeOption')
            ->with('orderItems.baseOption')
            ->with('orderItems.borderOption')
            ->where('id', $id)
            ->orderBy('created_at', 'desc')
            ->first();

        return response()->json($order, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $status = $request->get('status', null);
        $shipper_id = $request->get('shipper_id', null);

        if (!empty($status) && empty($shipper_id)) {

            $order->status = $status;
        } else

        if (empty($status) && !empty($shipper_id)) {
            $order->shipper_id = $shipper_id;
        } else 

        if (!empty($status) && !empty($shipper_id)) {
            $order->status = $status;
            $order->shipper_id = $shipper_id;
        }

        $order->save();

        return response()->json($order, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $order->delete();

        return response()->json(null, 204);
    }
}
