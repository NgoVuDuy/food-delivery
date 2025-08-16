<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $fillable = [
        'name',
        'phone',
        'password',
    ];

    public function cart() {
        return $this->hasOne(Cart::class);
    }

    public function shipper() {

        return $this->hasOne(Shipper::class, 'shipper_id');
    }

    public function staff() {
        return $this->hasOne(Staff::class, 'staff_id');
    }
}
