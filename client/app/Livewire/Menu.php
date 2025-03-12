<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Menu')]
class Menu extends Component
{

    public $products; // Các sản phẩm hiển thị
    public $default_products;

    public $categories; // Lưu các danh mục sản phẩm
    public $category_name = "Tất cả"; // Tên các danh mục

    public function mount() {

        $this->products = Http::get(Component::$url . 'products',
        [
            'per_page' => 9,
            'page' => 1
        ])->json();

        $this->default_products = $this->products;

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

    public function show_all_products_btn() {

        $this->reset('category_name');
        $this->products = $this->default_products;
    }

    public function render()
    {
        return view('livewire.menu');
    }
}
