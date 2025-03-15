<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use  Livewire\Attributes\Title;

#[Title('Thanh toán')]
class Checkout extends Component
{

    public $method;

    public $amount;
    public $ipaddr;
    public $urlreturn = "http://localhost:8000/order";


    public function mount() {

        $this->ipaddr = request()->ip();
        $this->amount = 259000;
    }
    public function payment_method(string $method) {
        $this->method = $method;
    }

    public function payment()
    {
        if($this->method == 'cod') {
            return $this->js("alert('chon cod')");
        } else 

        if($this->method == 'vnpay') {

            $response = Http::post(Component::$url . 'payments', [
    
                'amount' => $this->amount,
                'ipaddr' => $this->ipaddr,
            ])->json();
    
            if($response["message"] == "success") {
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
