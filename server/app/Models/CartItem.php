<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $fillable = [
        'product_id', 'cart_id', 'quantity', 'size_option_id', 'base_option_id', 'border_option_id', 'has_options', 'total'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function sizeOption() {
        return $this->belongsTo(Option::class, 'size_option_id');
    }
    public function baseOption() {
        return $this->belongsTo(Option::class, 'base_option_id');
    }
    public function borderOption() {
        return $this->belongsTo(Option::class, 'border_option_id');
    }
}
