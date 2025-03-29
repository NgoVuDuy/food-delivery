<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Completed extends Component
{
    public $completed_arrays = [];
    public $completed_orders = [];

    public $pending_count = 0;
    public $preparing_count = 0;

    public function mount()
    {

        $this->completed_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'completed'
        ])->json();

        $this->completed_orders = $this->completed_arrays["orders"];
        $this->preparing_count = $this->completed_arrays["count"];

        // dd($this->pendding_order);
    }
    public function render()
    {
        return view('livewire.staff.completed');
    }
}
