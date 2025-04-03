<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Delivering extends Component
{
    public $delivering_arrays = [];
    public $delivering_orders = [];
    public $count_orders = [];

    public function mount()
    {
        $counts = Http::get(Component::$url . 'count-orders')->json();

        foreach ($counts as $count) {

            $this->count_orders[$count['status']] = $count['total'];
        }

        $this->delivering_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'delivering'
        ])->json();

        $this->delivering_orders = $this->delivering_arrays["orders"];

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
    public function refreshData()
    {
        $this->delivering_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'delivering'
        ])->json();

        $this->delivering_orders = $this->delivering_orders["orders"];
    }
    public function render()
    {
        return view('livewire.staff.delivering');
    }
}
