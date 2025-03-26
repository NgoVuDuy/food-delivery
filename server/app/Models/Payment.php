<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = ['vnp_Amount','vnp_BankCode','vnp_BankTranNo','vnp_CardType','vnp_OrderInfo','vnp_PayDate','vnp_ResponseCode','vnp_TmnCode','vnp_TransactionNo','vnp_TransactionStatus','vnp_TxnRef','vnp_SecureHash'];

    public function order() {
        return $this->hasOne(Order::class, 'payment_id');
    }
}
