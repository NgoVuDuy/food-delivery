<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'place_name', 'place_id', 'store_location_id', 'shipper_id', 'staff_id', 'total_price', 'status'
    ];
}
