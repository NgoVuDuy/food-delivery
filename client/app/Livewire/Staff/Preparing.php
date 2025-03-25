<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Preparing extends Component
{
    public $preparing_orders = [];

    public function mount() {

        $this->preparing_orders =  Http::get(Component::$url . 'orders', [
            'status' => 'Chờ thực hiện'
        ])->json();

        // dd($this->pendding_order);

    }

    public function preparing_conform(string $id) {

        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "Đã hoàn thành"
        ])->json();
    }
    public function render()
    {
        return view('livewire.staff.preparing');
    }
}
