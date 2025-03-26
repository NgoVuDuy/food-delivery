<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Preparing extends Component
{
    public $preparing_arrays = [];
    public $preparing_orders = [];

    public $pending_count = 0;
    public $preparing_count = 3;


    public function mount()
    {

        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'Chờ thực hiện'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
        $this->pending_count = $this->preparing_arrays["count"];

        // dd($this->pendding_order);
    }

    public function refreshData()
    {
        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'Chờ thực hiện'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
        $this->pending_count = $this->preparing_arrays["count"];
    }

    public function pending_conform(string $id)
    {

        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "Đã sẵn sàng"
        ])->json();

        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'Chờ thực hiện'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
        $this->pending_count = $this->preparing_arrays["count"];
    }

    public function render()
    {
        return view('livewire.staff.preparing');
    }
}
