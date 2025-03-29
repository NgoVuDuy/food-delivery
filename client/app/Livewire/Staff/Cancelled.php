<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Cancelled extends Component
{
    public $cancelled_arrays = [];
    public $cancelled_orders = [];

    public $pending_count = 0;
    public $preparing_count = 0;
    public function mount()
    {

        $this->cancelled_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'cancelled'
        ])->json();

        $this->cancelled_orders = $this->cancelled_arrays["orders"];
        $this->preparing_count = $this->cancelled_arrays["count"];

        // dd($this->pendding_order);
    }

    
    public function render()
    {
        return view('livewire.staff.cancelled');
    }
}
