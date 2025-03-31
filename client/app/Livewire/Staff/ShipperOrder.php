<?php

namespace App\Livewire\Staff;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

use Livewire\Attributes\Session;

class ShipperOrder extends Component
{
    public $shipper_arrays = [];
    public $shipper_orders = [];

    public $points;
    public $location;

    #[Session(key: 'user')]
    public $user;

    public $count_orders = [];

    public function mount()
    {
        $counts = Http::get(Component::$url . 'count-orders')->json();

        foreach ($counts as $count) {

            $this->count_orders[$count['status']] = $count['total'];
        }

        // Nếu trạng thái status = -1 (đang rảnh) -> lấy ra một đơn đã sẵn sàng được đặt sớm nhất
        // Nếu trạng thái status = 1 (đang bận) -> lấy đơn bên đang giao
        // $this->user = null;
        // $this->user["shipper"]["status"] = -1;
        // dd($this->user);

        if (!empty($this->user)) {

            // dd($this->user);

            if ($this->user["shipper"]["status"] == -1) {

                $this->shipper_arrays =  Http::get(Component::$url . 'orders', [
                    'status' => 'ready',
                    'shipper_id' => $this->user["shipper"]["id"]
                ])->json();

            } else {
                $this->shipper_arrays =  Http::get(Component::$url . 'orders', [
                    'status' => 'delivering',
                    'shipper_id' => $this->user["shipper"]["id"]
                ])->json();

            }
        }

        // Cần làm: Nếu số đơn đã sẵn sàng lớn hơn 3 -> bắt buộc phải giao 2 đơn
        if (!empty($this->shipper_arrays["orders"])) {

            $this->shipper_orders[] = $this->shipper_arrays["orders"][$this->shipper_arrays["count"] - 1];

            if(count($this->shipper_orders) == 1) {
                $place_id = $this->shipper_orders[0]["place_id"];
            }

            $this->location = Http::get(Component::$url . 'place-details', [
                'place_id' => $place_id
            ])->json();

            $this->points = Http::get(Component::$url . 'many-directions', [
    
                'origin' => '10.032652064752597,105.75079032376297',
                'destination' => $this->location["location"]["lat"] . ',' . $this->location["location"]["lng"],
                'vehicle' => 'car',
    
            ])->json();
        } 



    }
    public function start_delivery(string $order_id)
    {

        // cập nhật trạng thái của shipper là status = 1 (đang bận)
        if (!empty($this->user)) {

            $shipper = Http::put(Component::$url . 'shippers/' . $this->user["shipper"]["id"], [
                'status' => 1 // Tớ đâng bận giao hàng
            ])->json();

            // Cập nhật đơn order là trạng thái deliverying (đang giao)
            $order = Http::put(Component::$url . 'orders/' . $order_id, [
                'status' => 'delivering'
            ])->json();

            // $this->user["shipper"]["status"] == 1;
            $this->user = Http::get(Component::$url . 'users/' . $this->user["id"])->json();
        }

        return $this->redirect('/shipper-orders', navigate: true);

        // $this->reset('shipper_arrays');
        // $this->reset('shipper_orders');
        // // Lấy lại đơn đang giao
        // $this->shipper_arrays =  Http::get(Component::$url . 'orders', [
        //     'status' => 'delivering',
        //     'shipper_id' => $this->user["shipper"]["id"]
        // ])->json();

        // if (!empty($this->shipper_arrays)) {

        //     $this->shipper_orders[] = $this->shipper_arrays["orders"][$this->shipper_arrays["count"] - 1];
        // }
    }

    //
    public function success_order(string $order_id)
    {

        if (!empty($this->user)) {

            $shipper = Http::put(Component::$url . 'shippers/' . $this->user["shipper"]["id"], [
                'status' => -1 // Tớ rảnh rồi nè
            ])->json();

            // Cập nhật đơn order là trạng thái completed (đã hoàn thành)
            $order = Http::put(Component::$url . 'orders/' . $order_id, [
                'status' => 'completed'
            ])->json();

            $this->user = Http::get(Component::$url . 'users/' . $this->user["id"])->json();
        }

        return $this->redirect('/shipper-orders', navigate: true);


        // $this->reset('shipper_arrays');
        // $this->reset('shipper_orders');
        // // Lấy lại đơn đang giao
        // $this->shipper_arrays =  Http::get(Component::$url . 'orders', [
        //     'status' => 'ready',
        //     'shipper_id' => $this->user["shipper"]["id"]
        // ])->json();

        // if (!empty($this->shipper_arrays)) {

        //     $this->shipper_orders[] = $this->shipper_arrays["orders"][$this->shipper_arrays["count"] - 1];
        // }
    }

    public function fail_order(string $order_id)
    {
        if (!empty($this->user)) {

            $shipper = Http::put(Component::$url . 'shippers/' . $this->user["shipper"]["id"], [
                'status' => -1 // Tớ rảnh rồi nè
            ])->json();

            // Cập nhật đơn order là trạng thái completed (đã hoàn thành)
            $order = Http::put(Component::$url . 'orders/' . $order_id, [
                'status' => 'cancelled'
            ])->json();

            $this->user = Http::get(Component::$url . 'users/' . $this->user["id"])->json();
        }

        return $this->redirect('/shipper-orders', navigate: true);
    }


    public function render()
    {
        return view('livewire.staff.shipper-order');
    }
}
