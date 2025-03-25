<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id', 'has_options', 'size_option_id', 'base_option_id', 'border_option_id', 'quantity', 'total_price'
    ];

    public function order() {

        return $this->belongsTo(Order::class, 'order_id');
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
