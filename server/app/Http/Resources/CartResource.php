<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user_id' => $this -> user_id,
            'user' => $this->user -> only(['name', 'phone']),
            'cart_items' => $this->cartItems 
            
            -> map(function($item) {
                return [
                    'has_options' => $item->has_options,
                    'quantity' => $item->quantity,
                    'product' => $item -> product -> only([ 
                        'id', 'name', 'price', 'description', 'image'

                    ]),
                    'size_option' => $item->sizeOption -> only(['name']),
                    'base_option' => $item->baseOption -> only(['name']),
                    'border_option' => $item->borderOption -> only(['name']),
                ];
            }),


            
        ];
    }
}
