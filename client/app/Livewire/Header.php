<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\On;


class Header extends Component
{
    public $search_text;
    public $count;


    public function mount() {

        $this->count = Http::get(Component::$url . 'count-cart')->json();

    }

    public function search() {

        return $this->redirect('/search?text=' . $this->search_text, navigate: true);
    }

    #[On('updateCountCart')]
    public function update_count_cart() {
        $this->count = Http::get(Component::$url . 'count-cart')->json();

    }

    public function render()
    {
        return view('livewire.header');
    }
}
