<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;


class Search extends Component
{
    public $search_text;
    public $products;

    public function mount() {

        $this->search_text = request()->query('text');

        $this->products = Http::get(Component::$url . 'search',[
            'product_name' => $this->search_text
        ])->json();


    }

    public function render()
    {
        return view('livewire.search');
    }
}
