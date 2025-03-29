<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class Pending extends Component
{
    public $pending_arrays = [];
    public $pending_orders = [];
    public $pending_count = 0;
    public $preparing_count = 0;

    public function mount() {

        $this->pending_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'pending'
        ])->json();

        $this->pending_orders = $this->pending_arrays["orders"];
        $this->pending_count = $this->pending_arrays["count"];

    }

    public function refreshData() {
        $this->pending_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'pending'
        ])->json();

        $this->pending_orders = $this->pending_arrays["orders"];
        $this->pending_count = $this->pending_arrays["count"];
    }

    public function pending_conform(string $id) {

        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "preparing"
        ])->json();

        $this->pending_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'pending'
        ])->json();

        $this->pending_orders = $this->pending_arrays["orders"];
        $this->pending_count = $this->pending_arrays["count"];
    }

    public function render()
    {
        return view('livewire.staff.pending');
    }
}
