<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Session;


#[Title('Đơn hàng')]
class Order extends Component
{
    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    // #[Session(key: 'order-status')]
    public $order_statuses;

    public $order;
    public $order_id;

    public function mount($id)
    {

        $this->order_id = $id;

        $this->order = Http::get(Component::$url . 'orders/' . $this->order_id)->json();

        $order_status = $this->order["status"];


        $this->order_statuses[0] = false;
        $this->order_statuses[1] = false;
        $this->order_statuses[2] = false;
        $this->order_statuses[3] = false;
        $this->order_statuses[4] = false;

        if ($order_status == 'Chờ xác nhận') {

            $this->order_statuses[0] = true;
        }
        if ($order_status == 'Đang chuẩn bị') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
        }
        if ($order_status == 'Đã sẵn sàng') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
        }
        if ($order_status == 'Đang giao') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
        }
        if ($order_status == 'Thành công') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
            $this->order_statuses[4] = true;
        }
    }

    public function reset_data()
    {

        $this->order = Http::get(Component::$url . 'orders/' . $this->order_id)->json();

        $order_status = $this->order["status"];

        if ($order_status == 'Chờ xác nhận') {

            $this->order_statuses[0] = true;
        }
        if ($order_status == 'Đang chuẩn bị') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
        }
        if ($order_status == 'Đã sẵn sàng') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
        }
        if ($order_status == 'Đang giao') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
        }
        if ($order_status == 'Thành công') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
            $this->order_statuses[4] = true;
        }
    }

    public function render()
    {
        return view('livewire.order');
    }
}
