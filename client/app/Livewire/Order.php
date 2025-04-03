<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Session;

use Livewire\Attributes\On;



#[Title('Đơn hàng')]
class Order extends Component
{
    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    // #[Session(key: 'order-status')]
    public $order_statuses;

    public $order;
    public $order_id;

    public $shipper;
    public $shipper_lat;
    public $shipper_lng;

    public $points;

    public function mount($id)
    {

        $this->order_id = $id;

        $this->order = Http::get(Component::$url . 'orders/' . $this->order_id)->json();

        // dd($this->order);
        $this->shipper = Http::get(Component::$url . 'shippers/' . $this->order["shipper_id"])->json();
        // dd($this->shipper);
        $this->points = Http::get(Component::$url . 'directions', [

            'origin' => $this->shipper["latitude"] . ',' . $this->shipper["longitude"],
            'destination' => $this->infor_delivery["to"]["lat"] . ',' . $this->infor_delivery["to"]["lng"],
            'vehicle' => 'car',

        ])->json();
        // dd($this->points);


        $order_status = $this->order["status"];


        $this->order_statuses[0] = false;
        $this->order_statuses[1] = false;
        $this->order_statuses[2] = false;
        $this->order_statuses[3] = false;
        $this->order_statuses[4] = false;

        if ($order_status == 'pending') {

            $this->order_statuses[0] = true;
        }
        if ($order_status == 'preparing') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
        }
        if ($order_status == 'ready') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
        }
        if ($order_status == 'delivering') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
        }
        if ($order_status == 'completed') {

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

        if ($order_status == 'pending') {

            $this->order_statuses[0] = true;
        }
        if ($order_status == 'preparing') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
        }
        if ($order_status == 'ready') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
        }
        if ($order_status == 'delivering') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
        }
        if ($order_status == 'completed') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
            $this->order_statuses[4] = true;
        }
    }

    // #[On('updateShipperLocation')]
    // public function updateShipperLocation()
    // {

    //     $this->points = Http::get(Component::$url . 'directions', [

    //         'origin' => $this->shipper_lat . ',' . $this->shipper_lng,
    //         'destination' => $this->infor_delivery["to"]["lat"] . ',' . $this->infor_delivery["to"]["lng"],
    //         'vehicle' => 'car',

    //     ])->json();

    //     $this->dispatch('updatedShipperLocation');
    // }

    public function render()
    {
        return view('livewire.order');
    }
}
