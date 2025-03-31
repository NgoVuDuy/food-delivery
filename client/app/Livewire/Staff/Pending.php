<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class Pending extends Component
{
    public $pending_arrays = [];
    public $pending_orders = [];

    public $count_orders = [];

    public function mount()
    {

        $counts = Http::get(Component::$url . 'count-orders')->json();

        foreach ($counts as $count) {

            $this->count_orders[$count['status']] = $count['total'];
        }

        $this->pending_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'pending'
        ])->json();


        $this->pending_orders = $this->pending_arrays["orders"];

        // dd($this->pending_orders);

        // pen
        // preparing
        // ready
        // delivering
        // completed
        // cancelled

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
        // dd($this->count_orders);
    }

    public function refreshData()
    {
        $this->pending_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'pending'
        ])->json();

        $this->pending_orders = $this->pending_arrays["orders"];
    }

    public function pending_conform(string $id)
    {
        $this->count_orders["pending"] -= 1;
        $this->count_orders["preparing"] += 1;


        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "preparing"
        ])->json();

        $this->pending_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'pending'
        ])->json();

        $this->pending_orders = $this->pending_arrays["orders"];
    }


    public function render()
    {
        return view('livewire.staff.pending');
    }
}
