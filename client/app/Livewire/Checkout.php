<?php

namespace App\Livewire;

use Livewire\Component;
use  Livewire\Attributes\Title;

#[Title('Thanh toán')]
class Checkout extends Component
{

    public $payment_method;

    public function render()
    {
        return view('livewire.checkout');
    }

    public function payment(string $method) {
        
        $this->payment_method = $method;
    }
}
