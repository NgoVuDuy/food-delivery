<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Ready extends Component
{
    public $ready_arrays = [];
    public $ready_orders = [];

    public $pending_count = 0;
    public $preparing_count = 0;

    
    public function mount()
    {

        $this->ready_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'ready'
        ])->json();

        $this->ready_orders = $this->ready_arrays["orders"];
        $this->preparing_count = $this->ready_arrays["count"];

        // dd($this->pendding_order);
    }

    public function refreshData()
    {
        $this->ready_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'ready'
        ])->json();

        $this->ready_orders = $this->ready_arrays["orders"];
        $this->preparing_count = $this->ready_arrays["count"];
    }

    public function preparing_conform(string $id)
    {

        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "delivering"
        ])->json();

        $this->ready_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'ready'
        ])->json();

        $this->ready_orders = $this->ready_arrays["orders"];
        $this->preparing_count = $this->ready_arrays["count"];
    }


    public function render()
    {
        return view('livewire.staff.ready');
    }
}
