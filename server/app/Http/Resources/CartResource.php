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
                    'id' => $item -> id,
                    'has_options' => $item->has_options,
                    'quantity' => $item->quantity,
                    'total' => $item->total,

                    // 'product' => $item -> product -> only([ 
                    //     'id', 'name', 'price', 'description', 'image'

                    // ]),

                    'product' => [

                        'id' => $item -> product -> id,
                        'name' => $item -> product -> name,
                        'price' => number_format($item -> product -> price, 0, '.', '.'),
                        'description' => $item -> product -> description,
                        'image' => $item -> product -> image
                    ],
                    
                    // -> map(function($product_item) {

                    //     return [

                            // 'id' => $product_item -> id,
                            // 'name' => $product_item -> name,
                            // 'price' => number_format($product_item -> price, 0, '.', '.'),
                            // 'description' => $product_item -> description,
                            // 'image' => $product_item -> image
                    //     ];

                    // }),
                    
                    'size_option' => $item->sizeOption -> only(['id','name']),
                    'base_option' => $item->baseOption -> only(['id','name']),
                    'border_option' => $item->borderOption -> only(['id','name']),
                ];
            }),


            
        ];
    }
}
