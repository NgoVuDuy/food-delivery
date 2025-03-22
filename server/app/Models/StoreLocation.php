<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    //
    protected $fillable = [
        'name', 'open', 'address', 'latitude', 'longitude'
    ];
}
