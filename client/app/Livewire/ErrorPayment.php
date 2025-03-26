<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.empty')]
#[Title('NVD\'s Pizzeria')]

class ErrorPayment extends Component
{

    public function back_btn() {
        return $this->redirect('/checkout', navigate:true);
    }

    public function render()
    {
        return view('livewire.error-payment');
    }
}
