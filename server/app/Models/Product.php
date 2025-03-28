<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'image', 'product_categories_id'
    ];

    public function category() {
        return $this -> belongsTo(ProductCategory::class, 'product_categories_id');
    }

    public function options() {
        return $this -> belongsToMany(Option::class, 'product_option');
    }

    public function cartItems() {
        return $this-> hasMany(CartItem::class, 'product_id');
    }

    public function orderItems() {
        return $this-> hasMany(OrderItem::class, 'product_id');
    }
    
}
