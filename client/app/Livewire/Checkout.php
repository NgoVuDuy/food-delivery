<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use  Livewire\Attributes\Title;
use  Livewire\Attributes\Session;


#[Title('Thanh toán')]
class Checkout extends Component
{

    public $method;

    // public $amount;
    public $ipaddr;
    public $urlreturn = "http://localhost:8000/order";

    #[Session(key: 'cartItems')]
    public $carts;

    #[Session(key: 'total')]
    public $total;

    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    public $distance; // mảng chứa các giá trị độ dài từ vị trí giao hàng đến các chi nhánh

    public $store_location;
    public $distance_text; // mảng
    public $duration_text; // mảng

    public function mount()
    {

        // dd($this->infor_delivery["from"]);

        // 
        $this->ipaddr = request()->ip();
        // $this->amount = 259000;

        $this->store_location = Http::get(Component::$url . 'store-locations')->json(); // Thông tin các chi nhánh

        // Duyệt qua các chi nhánh
        foreach ($this->store_location as $index => $store_location) {


            // Thông tin đường đi thời gian
            $directions = Http::get(Component::$url . 'directions', [

                'origin' => $this->infor_delivery["location"]["lat"] . ',' . $this->infor_delivery["location"]["lng"],
                'destination' => $store_location["latitude"] . ',' . $store_location["longitude"],
                'vehice' => 'car'

            ])->json();

            // dd($directions);


            $this->distance[$index] = $directions["distance"]["value"];

            $this->distance_text[$index] = $directions["distance"]["text"];
            $this->duration_text[$index] = $directions["duration"]["text"];
        }

        $min_distance = min($this->distance); // Giá trị đường đi nhỏ nhất

        $index_distance = array_search($min_distance, $this->distance); // Vị trí của giá trị đó trong mảng

        $this->store_location = $this->store_location[$index_distance];
        $this->distance_text = $this->distance_text[$index_distance];
        $this->duration_text = $this->duration_text[$index_distance];

        $this->infor_delivery["from"] = [
            "store_name" => $this->store_location["name"] . ' (' . $this->distance_text . ' - ' . $this->duration_text . ' )',
            "lat" => $this->store_location["latitude"],
            "lng" => $this->store_location["longitude"]

        ];


        // dd($this->infor_delivery);


    }
    public function payment_method(string $method)
    {
        $this->method = $method;
    }

    public function payment()
    {
        if ($this->method == 'cod') {

            return $this->redirect('/order', navigate: true);
        } else 

        if ($this->method == 'vnpay') {

            $amount = (int) str_replace('.', '', $this->total,);

            $response = Http::post(Component::$url . 'payments', [

                'amount' => $amount,
                'ipaddr' => $this->ipaddr,
            ])->json();

            if ($response["message"] == "success") {
                return $this->redirect($response["data"]);
            }
        } else {
            return $this->js("alert('chon thanh toan di nhoc')");
        }
    }


    public function render()
    {
        return view('livewire.checkout');
    }
}
