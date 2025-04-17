<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $table = 'staffs';

    protected $fillable = ['staff_id', 'store_location_id'];

    public function user() {

        return $this->belongsTo(User::class, 'staff_id');
    }
}
