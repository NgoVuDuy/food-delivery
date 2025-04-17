<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;

class UserOrderStatus extends Component
{
    public $user_order = [];

    public function mount()
    {

        if (session('user')) {

            $this->user_order = Http::get(Component::$url . 'orders', [

                'user_id' => session('user')['id'],
            ])->json();
        }
    }

    public function order_details(string $order_id)
    {

        return $this->redirect('/orders' . '/' . $order_id, navigate: true);
    }
    
    #[On('completedOrder')]
    public function completedOrder()
    {
        if (session('user')) {

            $this->user_order = Http::get(Component::$url . 'orders', [

                'user_id' => session('user')['id'],
            ])->json();
        }
    }

    public function render()
    {
        return view('livewire.user-order-status');
    }
}
