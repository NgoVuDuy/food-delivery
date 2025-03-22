<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'user_id', 'customer_name', 'customer_phone', 'place_name', 'place_id', 'lat', 'lng'
    ];
}
