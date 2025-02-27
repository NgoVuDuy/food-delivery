<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Menu')]
class Menu extends Component
{

    public $products = [];

    public $category_text = "";

    public function mount() {

        // $this->products = Http::get('http://localhost:8001/api/products')->json();

        $this->category_text = "Tất cả";

        $this->products = [
            [
                'name' => 'Pizza Thịt heo',
                'price' => 127000,
                'image' => "Products/pizza-home-1.png"
            ],
            [
                'name' => 'Pizza Rau Củ',
                'price' => 187000,
                'image' => "Products/pizza-home-2.png"
    
            ],
            [
                'name' => 'Pizza Pizza Hải Sản',
                'price' => 142000,
                'image' => "Products/pizza-home-3.png"
    
            ],
            [
                'name' => 'Pizza Phô Mai',
                'price' => 222000,
                'image' => "Products/pizza-home-4.png"
    
            ],
            [
                'name' => 'Pizza Cay',
                'price' => 123000,
                'image' => "Products/pizza-home-2.png"
    
            ]
    
        ];
    }

    public function category(string $category_text) {
        
        $this->category_text = $category_text;

        if($category_text == "Meat Lover's Pizza") {
            $this->products = [
                [
                    'name' => 'Pizza Thịt heo',
                    'price' => 127000,
                    'image' => "Products/pizza-home-1.png"
                ]
                ];
        }
        if($category_text == "Vegetarian Pizza") {
            $this->products = [
                [
                    'name' => 'Pizza Rau Củ',
                    'price' => 187000,
                    'image' => "Products/pizza-home-2.png"
        
                ],
                ];
        }
        if($category_text == "Seafood Pizza") {
            $this->products = [
                [
                    'name' => 'Pizza Pizza Hải Sản',
                    'price' => 142000,
                    'image' => "Products/pizza-home-3.png"
        
                ],
                ];
        }
        if($category_text == "Cheese Pizza") {
            $this->products = [
                [
                    'name' => 'Pizza Phô Mai',
                    'price' => 222000,
                    'image' => "Products/pizza-home-4.png"
        
                ],
                ];
        }
        if($category_text == "Spicy Pizza") {
            $this->products = [
                [
                    'name' => 'Pizza Cay',
                    'price' => 123000,
                    'image' => "Products/pizza-home-2.png"
        
                ]
                ];
        }
    }

    public function render()
    {
        return view('livewire.menu');
    }
}
