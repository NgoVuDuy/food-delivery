<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Chi tiết món')] 
class DishDetail extends Component
{
    public function render()
    {
        return view('livewire.dish-details');
    }
}
