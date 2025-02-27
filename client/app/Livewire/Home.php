<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang chủ')] 
class Home extends Component
{


    public function render()
    
    {
        return view('livewire.home');
    }
}
