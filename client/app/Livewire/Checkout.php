<?php

namespace App\Livewire;

use Livewire\Component;
use  Livewire\Attributes\Title;

#[Title('Thanh toán')]
class Checkout extends Component
{
    public function render()
    {
        return view('livewire.checkout');
    }
}
