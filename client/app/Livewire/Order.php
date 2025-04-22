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

    public $customer_lat;
    public $customer_lng;

    public $points;

    public $order_status;

    #[Session(key: 'orders-id')]
    public $orders_id;

    public function mount($id)
    {
        // dd($this->orders_id);
        // dd(session('orders-id'));
        // dd($result);
        // Reset lại index mảng và lưu lại session
        // session(['orders-id' => array_values($orders_id)]);

        $this->order_id = $id;

        $this->order = Http::get(Component::$url . 'orders/' . $this->order_id)->json();

        $location = Http::get(Component::$url . 'place-details', [

            "place_id" => $this->order["place_id"]
        ])->json();

        $this->customer_lat = $location["location"]["lat"];
        $this->customer_lng = $location["location"]["lng"];

        // dd($this->order);

        // $this->shipper = Http::get(Component::$url . 'shippers/' . $this->order["shipper_id"])->json();
        // $this->points = Http::get(Component::$url . 'directions', [

        //     'origin' => $this->shipper["latitude"] . ',' . $this->shipper["longitude"],
        //     'destination' => $this->infor_delivery["to"]["lat"] . ',' . $this->infor_delivery["to"]["lng"],
        //     'vehicle' => 'car',

        // ])->json();

        $this->order_status = $this->order["status"];

        $this->order_statuses[0] = false;
        $this->order_statuses[1] = false;
        $this->order_statuses[2] = false;
        $this->order_statuses[3] = false;
        $this->order_statuses[4] = false;

        if ($this->order_status == 'pending') {

            $this->order_statuses[0] = true;
        }
        if ($this->order_status == 'preparing') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
        }
        if ($this->order_status == 'ready') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
        }
        if ($this->order_status == 'delivering') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
        }
        if ($this->order_status == 'completed') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
            $this->order_statuses[4] = true;
        }

        // $this->shipper = Http::get(Component::$url . 'shippers/' . $this->order["shipper_id"])->json();
        // $this->points = Http::get(Component::$url . 'directions', [

        //     'origin' => $this->shipper["latitude"] . ',' . $this->shipper["longitude"],

        //     // 'destination' => $this->infor_delivery["to"]["lat"] . ',' . $this->infor_delivery["to"]["lng"],
        //     'destination' => $this->customer_lat . ',' . $this->customer_lng,

        //     'vehicle' => 'car',

        // ])->json();
    }

    public function reset_data()
    {

        $this->order = Http::get(Component::$url . 'orders/' . $this->order_id)->json();

        $this->order_status = $this->order["status"];

        if ($this->order_status == 'pending') {

            $this->order_statuses[0] = true;
        }
        if ($this->order_status == 'preparing') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
        }
        if ($this->order_status == 'ready') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
        }
        if ($this->order_status == 'delivering') {

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;

            $this->shipper = Http::get(Component::$url . 'shippers/' . $this->order["shipper_id"])->json();

            $this->points = Http::get(Component::$url . 'directions', [

                'origin' => $this->shipper["latitude"] . ',' . $this->shipper["longitude"],
                // 'destination' => $this->infor_delivery["to"]["lat"] . ',' . $this->infor_delivery["to"]["lng"],
                // $this->customer_lat
                'destination' => $this->customer_lat . ',' . $this->customer_lng,

                'vehicle' => 'car',

            ])->json();

            $this->dispatch('updatedShipperLocation');
        }

        if ($this->order_status == 'completed') {

            $this->orders_id = session('orders-id', []);

            $result['orders'] = array_filter($this->orders_id["orders"], function ($item) {

                return $item['id'] != $this->order_id;
            });

            $this->orders_id = $result['orders'];

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
            $this->order_statuses[4] = true;

            $this->dispatch('completedOrder');
        }

        if ($this->order_status == 'cancelled') {

            $this->orders_id = session('orders-id', []);

            $result['orders'] = array_filter($this->orders_id["orders"], function ($item) {

                return $item['id'] != $this->order_id;
            });

            $this->orders_id = $result['orders'];

            $this->order_statuses[0] = true;
            $this->order_statuses[1] = true;
            $this->order_statuses[2] = true;
            $this->order_statuses[3] = true;
            $this->order_statuses[4] = true;

            $this->dispatch('cancelledOrder');
        }
    }
    public function back_home()
    {

        return $this->redirect('/home', navigate: true);
    }

    public function render()
    {
        return view('livewire.order');
    }
}
