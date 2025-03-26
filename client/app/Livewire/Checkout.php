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

    #[Session(key: 'carts')]
    public $carts;

    #[Session(key: 'total')]
    public $total;

    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    #[Session(key: 'user')]
    public $user;

    public $distance; // mảng chứa các giá trị độ dài từ vị trí giao hàng đến các chi nhánh

    #[Session(key: 'store-location')]
    public $store_location;
    
    public $distance_text; // mảng
    public $duration_text; // mảng
    public $points;

    public function mount()
    {

        // dd($this->carts);
        $this->ipaddr = request()->ip();

        $this->store_location = Http::get(Component::$url . 'store-locations')->json(); // Thông tin các chi nhánh

        // Duyệt qua các chi nhánh
        foreach ($this->store_location as $index => $store_location) {


            // Thông tin đường đi thời gian
            $directions = Http::get(Component::$url . 'directions', [

                'origin' => $store_location["latitude"] . ',' . $store_location["longitude"],
                'destination' => $this->infor_delivery["to"]["lat"] . ',' . $this->infor_delivery["to"]["lng"],
                'vehice' => 'car'

            ])->json();

            $this->distance[$index] = $directions["distance"]["value"]; // lấy ra các giá trị đoạn đường

            $this->points[$index] = $directions["points"]; // mảng các chỉ  đường

            $this->distance_text[$index] = $directions["distance"]["text"]; // lấy ra mảng text các giá trị đoạn đường
            $this->duration_text[$index] = $directions["duration"]["text"]; // lấy ra mảng text các giá trị thời gian
        }

        $min_distance = min($this->distance); // Giá trị đường đi nhỏ nhất

        $index_distance = array_search($min_distance, $this->distance); // Vị trí của giá trị đó trong mảng

        $this->store_location = $this->store_location[$index_distance];
        $this->distance_text = $this->distance_text[$index_distance];
        $this->duration_text = $this->duration_text[$index_distance];
        $this->points = $this->points[$index_distance];

        $this->infor_delivery["from"] = [
            "store_name" => $this->store_location["name"] . ' (' . $this->distance_text . ' - ' . $this->duration_text . ' )',
            "lat" => $this->store_location["latitude"],
            "lng" => $this->store_location["longitude"]

        ];

        $this->infor_delivery["points"] = $this->points;
    }
    public function payment_method(string $method)
    {
        $this->method = $method;
    }

    // Án nút thanh toán 
    public function payment()
    {
        // dd($this->total);

        if ($this->method == 'cod' || $this->method == 'vnpay') {

            // Kiểm tra có đăng nhập chưa
            if (!empty($this->user)) {

                // Lưu lại địa chỉ giao hàng của khách hàng cho những lần sau
                $address = Http::post(Component::$url . 'addresses', [
                    'user_id' => $this->user["id"],
                    'customer_name' => $this->infor_delivery["name"],
                    'customer_phone' => $this->infor_delivery["phone"],
                    'place_id' => $this->infor_delivery["place_id"],
                    'place_name' => $this->infor_delivery["place_name"],
                    'created_at' => now(),
                    'updated_at' => now()

                ])->json();
            }

            if ($this->method == 'cod') {

                if (!empty($this->user)) {

                    // Lưu lại thông tin order vào bảng đơn hàng
                    $response = Http::post(Component::$url . 'orders', [

                        'user_id' => $this->user["id"],
                        'name' => $this->infor_delivery["name"],
                        'phone' => $this->infor_delivery["phone"],
                        'place_name' => $this->infor_delivery["to"]["place_name"],
                        'place_id' => $this->infor_delivery["to"]["place_id"],
                        'store_location_id' => $this->store_location["id"],
                        'total_price' => str_replace('.', '', $this->total),
                        'payment_method' => "COD",
                        'status' => 'Chờ xác nhận'

                    ]);

                } else {

                    $response = Http::post(Component::$url . 'orders', [

                        'name' => $this->infor_delivery["name"],
                        'phone' => $this->infor_delivery["phone"],
                        'place_name' => $this->infor_delivery["to"]["place_name"],
                        'place_id' => $this->infor_delivery["to"]["place_id"],
                        'store_location_id' => $this->store_location["id"],
                        'total_price' => str_replace('.', '', $this->total),
                        'payment_method' => "COD",
                        'status' => 'Chờ xác nhận'

                    ]);

                }
                
                if ($response->successful()) {

                    $order_id = $response->json()["id"];

                    foreach($this->carts["cart_items"] as $index => $carts_items) {

                        $orderItem = Http::post(Component::$url . 'order-items', [
                            'order_id' => $order_id,
                            'product_id' => $carts_items['product']['id'],
                            'has_options'=> $carts_items['has_options'],
                            'quantity' => $carts_items['quantity'],
                            'total_price' => $carts_items['total'],
                            'size_option_id' => $carts_items['size_option']['id'],
                            'base_option_id' => $carts_items['base_option']['id'],
                            'border_option_id' => $carts_items['border_option']['id']
                        ])->json();
                    }
                }
                return $this->redirect('/orders' . '/' . $order_id, navigate: true);
            }

            if ($this->method == 'vnpay') {


                // Kiểm tra có đăng nhập chưa
                $amount = (int) str_replace('.', '', $this->total,);

                $response = Http::post(Component::$url . 'payments', [

                    'amount' => $amount,
                    'ipaddr' => $this->ipaddr,
  
                ])->json();

                if ($response["message"] == "success") {

                    return $this->redirect($response["data"]);
                }
            }
        } else {

            return $this->js("alert('Vui lòng chọn phương thức thanh toán')");
        }
    }


    public function render()
    {
        return view('livewire.checkout');
    }
}
