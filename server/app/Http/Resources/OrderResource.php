<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this -> id,
            'name' => $this->name,
            'phone' => $this->phone,
            'place_name' => $this->place_name,
            'place_id' => $this->place_id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'payment_method' => $this->payment_method,
            'user_id' => $this -> user_id,
            'staff_id' => $this -> staff_id,
            'shipper_id' => $this -> shipper_id,
            'shipper' => $this -> shipper,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s'),
            // 'user' => $this->user -> only(['name', 'phone']),
            'store_location' => $this->storeLocation->only(['id', 'name', 'open', 'address']),
            'payment' => $this->payment,
            'order_items' => $this->orderItems
            -> map(function($item) {
                return [
                    'has_options' => $item->has_options,
                    'quantity' => $item->quantity,
                    'total_price' => $item->total_price,
                    'product' => $item->product->only(['id', 'name', 'price', 'image']),
                    'size_option' => $item->sizeOption -> only(['id','name']),
                    'base_option' => $item->baseOption -> only(['id','name']),
                    'border_option' => $item->borderOption -> only(['id','name']),
                ];
            }),
        ];
    }
}
