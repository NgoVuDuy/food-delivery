<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Menu')]
class Menu extends Component
{

    public $products;
    public $category;

    public function mount() {

        $this->products = Http::get(Component::$url . 'products',
        [
            'per_page' => 9,
            'page' => 1
        ])->json();

        $this->category = "Tất cả";
    }

    public function menu_pagination(string $page) {

        $this->products = Http::get(Component::$url . 'products',
        [
            'per_page' => 9,
            'page' => $page
        ])->json();
    }

    public function category(string $category) {
        
        $this->category = $category;

        if($category == "Meat Lover's Pizza") {
            $this->products = [
                [
                    'name' => 'Pizza Thịt heo',
                    'price' => 127000,
                    'image' => "Products/pizza-home-1.png"
                ]
                ];
        }
    }

    public function render()
    {
        return view('livewire.menu');
    }
}
