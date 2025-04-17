<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    //
    protected $fillable = ['shipper_id','store_location_id', 'latitude', 'longitude'];

    public function user() {

        return $this->belongsTo(User::class, 'shipper_id');
    }

    public function orders() {

        return $this->hasMany(Order::class, 'shipper_id');
    }
}
