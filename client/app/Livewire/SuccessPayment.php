<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Session;


#[Title('NVD\'s Pizzeria')]
#[Layout('components.layouts.empty')]
class SuccessPayment extends Component
{
    public $payment;

    #[Session(key: 'carts')]
    public $carts;

    #[Session(key: 'total')]
    public $total;

    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    #[Session(key: 'user')]
    public $user;

    #[Session(key: 'store-location')]
    public $store_location;

    public $order_id;

    public function mount()
    {

        $txn_ref = request()->query('query');

        $this->payment = Http::get(Component::$url . 'payments/' . $txn_ref)->json();

        $payment_id = $this->payment['id'];

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
                'payment_method' => "VNPAY",
                'payment_id' => $payment_id,
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
                'payment_method' => "VNPAY",
                'payment_id' => $payment_id,
                'status' => 'Chờ xác nhận'

            ]);
        }

        if ($response->successful()) {

            $this->order_id = $response->json()["id"];

            foreach ($this->carts["cart_items"] as $index => $carts_items) {

                $orderItem = Http::post(Component::$url . 'order-items', [
                    'order_id' => $$this->order_id,
                    'product_id' => $carts_items['product']['id'],
                    'has_options' => $carts_items['has_options'],
                    'quantity' => $carts_items['quantity'],
                    'total_price' => $carts_items['total'],
                    'size_option_id' => $carts_items['size_option']['id'],
                    'base_option_id' => $carts_items['base_option']['id'],
                    'border_option_id' => $carts_items['border_option']['id']
                ])->json();
            }
        }

        // dd($this->payment);

    }
    public function next_btn()
    {
        return $this->redirect('/orders' . '/' . $this->order_id, navigate: true);
    }
    public function render()
    {
        return view('livewire.success-payment');
    }
}
