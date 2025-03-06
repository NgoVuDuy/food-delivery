<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Chi tiết món')] 
class DishDetail extends Component
{

    public $product;
    public $options = [];

    public $quantity;
    public $default_price;
    //
    public $current_options = [];
    public $current_price_modifier = [];


    public function mount(string $id) {

        
        $this->product = Http::get(Component::$url . 'products' . '/' . $id)->json();

        $this->quantity = 1;
        $this->default_price = $this->product["price"];

        $this->options["size"] = Http::get(Component::$url . 'options-of-product',
        [
            'product_id' => $id,
            'option_category_name' => 'Kích Cỡ'
        ])->json();

        $this->options["base"] = Http::get(Component::$url . 'options-of-product',
        [
            'product_id' => $id,
            'option_category_name' => 'Đế Bánh'
        ])->json();

        $this->options["border"] = Http::get(Component::$url . 'options-of-product',
        [
            'product_id' => $id,
            'option_category_name' => 'Viền Bánh'
        ])->json();

    }

    public function decrease() {

        if($this->quantity > 1) {
            $this->quantity --;
        }

        $this->product["price"] = number_format($this->default_price * $this->quantity, 3, '.', '');


    }

    public function increase() {

        if($this->quantity < 10) {
            $this->quantity ++;
        }

        $this->product["price"] = number_format($this->default_price * $this->quantity, 3, '.', '');

    }

    public function size(string $size, string $price_modifier) {

        $this->current_options["size"] = $size;
        $this->current_price_modifier["size"] = $price_modifier;

    }

    public function base(string $base) {

        $this->current_options["base"] = $base;
        $this->current_price_modifier["base"] = '0';
    }

    public function border(string $border, string $price_modifier) {

        $this->current_options["border"] = $border;
        $this->current_price_modifier["border"] = $price_modifier;
    }

    public function render()
    {
        return view('livewire.dish-details');
    }
}
