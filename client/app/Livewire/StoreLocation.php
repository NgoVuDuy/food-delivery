<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Cửa hàng')]
class StoreLocation extends Component
{
    public function render()
    {
        return view('livewire.store-locations');
    }
}
