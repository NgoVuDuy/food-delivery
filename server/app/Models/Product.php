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

    public function options() {
        return $this -> belongsToMany(Option::class, 'product_option');
    }

    public function carts() {
        return $this-> hasMany(Cart::class, 'product_id');
    }
    
}
