<?php

namespace App\Livewire;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;



class Header extends Component
{
    public $search_text;
    public $count;

    #[Session(key: 'user')]
    public $user; //

    // #[Session(key: 'cartItems')]
    // public $carts;

    // #[Session(key: 'infor-delivery')]
    // public $infor_delivery;

    // #[Session(key: 'total')]
    // public $total; // Tổng tiền của tất cả sản phẩm


    public function mount()
    {

        // $this->count = Http::get(Component::$url . 'count-cart')->json();
        // dd(session()->get('cartItems'));

        if (!empty($this->user)) {

            $this->count = Http::get(Component::$url . 'count-cart', [
                'user_id' => $this->user["id"]
            ])->json();

            
        } else {

            if (session('carts')) {
                $this->count = count(session()->get('carts')["cart_items"]);
            } else {
                $this-> count = 0;
            }
        }
    }

    public function search()
    {

        return $this->redirect('/search?text=' . $this->search_text, navigate: true);
    }

    public function logout()
    {
        session()->flush();

        // $this->user = null;
        // $this->carts = null;

        $this->reset();

        // session()->forget('user');
        // session()->forget('carts');
        // session()->forget('total');
        // session()->forget('infor-delivery');
        // session()->flush();

        return $this->redirect('/home', navigate: true);
    }

    #[On('updatedCart')]
    public function update_count_cart()
    {

        if (!empty($this->user)) {

            $this->count = Http::get(Component::$url . 'count-cart', [
                'user_id' => $this->user["id"]
            ])->json();
        } else {

            if (session('carts')) {
                $this->count = count(session()->get('carts')["cart_items"]);
            } else {
                $this-> count = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.header');
    }
}
