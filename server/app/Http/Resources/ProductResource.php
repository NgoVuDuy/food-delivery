<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'price' => number_format($this->price, 0, '.', '.') ,
            'image' =>$this->image,
            'description' =>$this->description,
            'product_categories_id' => $this->product_categories_id,
            'categories' => $this->categories -> only(['name'])
        ];
    }
}
