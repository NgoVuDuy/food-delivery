<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    //
    protected $fillable = [
        'name', 'open', 'address', 'latitude', 'longitude'
    ];

    public  function orders() {

        return $this->hasMany(Order::class, 'store_location_id');
    }
}
