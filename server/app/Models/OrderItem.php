<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id', 'has_options', 'size_option_id', 'base_option_id', 'border_option_id', 'quantity', 'total_price'
    ];
}
