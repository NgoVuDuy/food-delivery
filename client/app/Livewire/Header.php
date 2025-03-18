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
    public $user; // Được xem là biến session

    // public $username = '';
    // public $isLogin = false;

    public function mount() {

        $this->count = Http::get(Component::$url . 'count-cart')->json();

    }

    public function search() {

        return $this->redirect('/search?text=' . $this->search_text, navigate: true);
    }

    public function logout() {

        $this->user = null;

        return $this->redirect('/home', navigate:true);
    }

    #[On('updatedCart')]
    public function update_count_cart() {
        $this->count = Http::get(Component::$url . 'count-cart')->json();

    }

    public function render()
    {
        return view('livewire.header');
    }
}
