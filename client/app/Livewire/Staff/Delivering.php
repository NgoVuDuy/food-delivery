<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Delivering extends Component
{
    public $delivering_arrays = [];
    public $delivering_orders = [];

    public $pending_count = 0;
    public $preparing_count = 0;

    public function mount()
    {

        $this->delivering_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'delivering'
        ])->json();

        $this->delivering_orders = $this->delivering_arrays["orders"];
        $this->preparing_count = $this->delivering_arrays["count"];

        // dd($this->pendding_order);
    }
    public function render()
    {
        return view('livewire.staff.delivering');
    }
}
