<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Menu')]
class Menu extends Component
{

    public $products;
    public $categories;

    public $category_name;

    public function mount() {

        $this->category_name = "Tất cả";
        $this->products = Http::get(Component::$url . 'products',
        [
            'per_page' => 9,
            'page' => 1
        ])->json();

        $this->categories = Http::get(Component::$url . 'product-categories')->json();

    }

    public function menu_pagination(string $page) {

        $this->products = Http::get(Component::$url . 'products',
        [
            'per_page' => 9,
            'page' => $page
        ])->json();
    }

    // Phương thức phân loại sản phẩm theo danh mục
    public function category(string $category_id, string $category_name) {
        
        $this->category_name = $category_name;

        $this->products = Http::get(Component::$url . 'category',[
            'category_id' => $category_id,
            'per_page' => 9
        ])->json();

    }

    public function render()
    {
        return view('livewire.menu');
    }
}
