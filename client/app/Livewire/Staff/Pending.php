<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Pending extends Component
{
    public $pending_orders = [];

    public function mount() {

        $this->pending_orders =  Http::get(Component::$url . 'orders', [
            'status' => 'Chờ xác nhận'
        ])->json();

        // dd($this->pendding_order);
        // dd("a heeh");

    }

    public function pending_conform(string $id) {

        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "Chờ thực hiện"
        ])->json();

        $this->pending_orders =  Http::get(Component::$url . 'orders', [
            'status' => 'Chờ xác nhận'
        ])->json();
    }

    public function render()
    {
        return view('livewire.staff.pending');
    }
}
