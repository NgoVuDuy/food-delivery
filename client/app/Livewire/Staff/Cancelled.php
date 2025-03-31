<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Cancelled extends Component
{
    public $cancelled_arrays = [];
    public $cancelled_orders = [];
    public $count_orders = [];


    public function mount()
    {
        $counts = Http::get(Component::$url . 'count-orders')->json();

        foreach ($counts as $count) {

            $this->count_orders[$count['status']] = $count['total'];
        }

        $this->cancelled_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'cancelled'
        ])->json();

        $this->cancelled_orders = $this->cancelled_arrays["orders"];

        // dd($this->pendding_order);
        if(empty($this->count_orders["pending"])) {
            $this->count_orders["pending"] = 0;
        }
        if(empty($this->count_orders["preparing"])) {
            $this->count_orders["preparing"] = 0;

        }
        if(empty($this->count_orders["ready"])) {
            $this->count_orders["ready"] = 0;

        }
        if(empty($this->count_orders["delivering"])) {
            $this->count_orders["delivering"] = 0;

        }
        if(empty($this->count_orders["completed"])) {
            $this->count_orders["completed"] = 0;

        }
        if(empty($this->count_orders["cancelled"])) {
            $this->count_orders["cancelled"] = 0;

        }
    }

    
    public function render()
    {
        return view('livewire.staff.cancelled');
    }
}
