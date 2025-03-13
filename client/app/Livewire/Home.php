<?php

namespace App\Livewire;

use App\Models\product;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang chủ')] 
class Home extends Component
{

    // Image header
    public $index;
    public $current_image;
    public $page_total;

    // typical dishs
    public $current_products;
    
    public function mount() {


        $this->current_products = Http::get(Component::$url . 'typical-products',
        [
            'per_page' => 4,
            'page' => 1
        ])->json();

        //homepage-images
        $this->index = 1;
        $this->page_total = 6;

        $this->current_image = Http::get(Component::$url . 'homepage-images',
        [
            'page' => 1
        ])->json();

    }
    public function paginate_img(string $page) {

        $this->index = $page;

        $this->current_image = Http::get(Component::$url . 'homepage-images',
        [
            'page' => $page
        ])->json();

    }

    public function prev() {

        $this->index --;

        if($this->index < 1) {  
            $this->index = $this->page_total;
        }
        
        $this->current_image = Http::get(Component::$url . 'homepage-images',
        [
            'page' => $this->index
        ])->json();

    }

    public function next() {

        $this->index ++;

        if($this->index > $this->page_total) {
            $this->index = 1;
        }

        $this->current_image = Http::get(Component::$url . 'homepage-images',
        [
            'page' => $this->index
        ])->json();
    }

    public function typical_dish_pagination(string $page) {

        $this->current_products = Http::get(Component::$url . 'typical-products',
        [
            'per_page' => 4,
            'page' => $page
        ])->json();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
