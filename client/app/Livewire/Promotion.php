<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Khuyến mãi')]
class Promotion extends Component
{
    public function render()
    {
        return view('livewire.promotion');
    }
}
