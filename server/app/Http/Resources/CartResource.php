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
            'product_id' => $this -> product_id,
            'user_id' => $this -> user_id,
            'quantity' => $this -> quantity,
            'size' => $this -> size,
            'base' => $this -> base,
            'border' => $this -> border,
            'total' => number_format($this -> total, 0, '.', '.') ,
            'product' => $this -> product -> only(['name', 'image'])
        ];
    }
}
