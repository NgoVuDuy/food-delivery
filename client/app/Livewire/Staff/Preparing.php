<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Preparing extends Component
{
    public $preparing_arrays = [];
    public $preparing_orders = [];

    public $pending_count = 0;
    public $preparing_count = 0;


    public function mount()
    {

        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'preparing'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
        $this->preparing_count = $this->preparing_arrays["count"];

        // dd($this->pendding_order);
    }

    public function refreshData()
    {
        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'preparing'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
        $this->preparing_count = $this->preparing_arrays["count"];
    }

    public function preparing_conform(string $id)
    {

        //Tính toán xem shipper nào đang rảnh và có tổng order đã hoàn thành thấp nhất
        $min_shipper_orders = Http::get(Component::$url . 'shipper-orders')->json();
        $shipper_id = $min_shipper_orders['id'];

        // dd($shipper_id);

        // Tính toán xem trạng thái đã sẵn sàng có bao nhiêu đơn
        // Nếu hơn 3 đơn thì shiiper sẽ được gán cho 2 đơn hàng
        // Ngược lại thì shipper gán 1 đơn hàng duy nhất

        // Thay đổi trạng thái (status, shipper-id)
        $order = Http::put(Component::$url . 'orders/' . $id, [
            'status' => "ready",
            'shipper_id' => $shipper_id
        ])->json();

        // Lấy lại các orders
        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'preparing'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
        $this->preparing_count = $this->preparing_arrays["count"];
    }

    public function render()
    {

        return view('livewire.staff.preparing');
    }
}
