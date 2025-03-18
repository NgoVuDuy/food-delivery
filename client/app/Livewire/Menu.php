<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Menu')]
class Menu extends Component
{

    public $products; // Các sản phẩm hiển thị
    public $default_products; // trạng thái ban đầu của sản phẩm
    public $data; // dữ liệu collection của sản phẩm

    public $categories; // Lưu các danh mục sản phẩm
    public $category_name = "Tất cả"; // Tên các danh mục

    // public $isHovered = [];


    public function mount() {

        $this->products = Http::get(Component::$url . 'products')->json();

        $this->default_products = $this->products;

        $this->data = $this->products["data"];

        $this->categories = Http::get(Component::$url . 'product-categories')->json();

        // foreach ($this->products['data'] as $index => $product) {
            
        //     $this->isHovered[$index] = false;
        // }

    }

    // Phương thức phân loại sản phẩm theo danh mục
    public function category(string $category_id, string $category_name) {
        
        $this->category_name = $category_name;

        $this->products["data"] = collect($this->data)->where('product_categories_id', $category_id)->values();

        // dd($this->products);
    }

    public function show_all_products_btn() {

        $this->reset('category_name');
        $this->products = $this->default_products;
    }
    // public function is_hover($status, $index)
    // {
    //     $this->isHovered[$index] = $status;
    // }

    public function render()
    {
        return view('livewire.menu');
    }
}
