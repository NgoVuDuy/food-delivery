<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Session;


#[Title('Đơn hàng')]
class Order extends Component
{
    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    public function mount() {
        
        // dd($this->infor_delivery);

    }


    public function render()
    {
        return view('livewire.order');
    }
}
