<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Preparing extends Component
{
    public $preparing_arrays = [];
    public $preparing_orders = [];
    public $count_orders = [];

    public function mount()
    {
        $counts = Http::get(Component::$url . 'count-orders')->json();

        foreach ($counts as $count) {

            $this->count_orders[$count['status']] = $count['total'];
        }

        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'preparing'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];

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
        $this->preparing_arrays =  Http::get(Component::$url . 'orders', [
            'status' => 'preparing'
        ])->json();

        $this->preparing_orders = $this->preparing_arrays["orders"];
    }

    public function preparing_conform(string $id)
    {

        $this->count_orders["preparing"] -= 1;
        $this->count_orders["ready"] += 1;

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
    }

    public function render()
    {

        return view('livewire.staff.preparing');
    }
}
