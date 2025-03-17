<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Chi tiết món')]
class DishDetail extends Component
{

    public $product; // Chứa thông tin 1 sản phẩm
    public $options = []; // Chứa các tùy chọn cho sản phẩm đó

    public $quantity; // Chứ tùy chọn số lượng
    public $default_price; // Giá gốc của sản phẩm
    //
    public $current_options = []; // Tùy chọn hiện tại của khách hàng
    public $current_price_modifier = []; // Phụ phí tính thêm ứng với tùy chọn 

    public $count_cart; // Đếm xem số lượng sản phẩm có trong giỏ hàng

    public $isAddToCart = false; // Trạng thái thêm vào giỏ hàng

    public $isPizza = true; // Kiểm tra sản phẩm có phải pizza không - hiển thị options

    // Phương thức xây dựng
    public function mount(string $id)
    {

        // Gọi api lấy thông tin sản phẩm
        $this->product = Http::get(Component::$url . 'products' . '/' . $id)->json();

        $this->quantity = 1; // Số lượng sản phẩm là 1
        $this->default_price = $this->product["price"]; // Lấy giá gốc của sản phẩm

        $this->options["size"] = [];
        $this->options["base"] = [];
        $this->options["border"] = [];


        if ($this->product["product_categories_id"] == 1) {

            // Gọi api lấy thông tin các tùy chọn của sản phẩm đó gồm (Kích cỡ, Đế bánh, Viên bánh)
            $this->options["size"] = Http::get(
                Component::$url . 'options-of-product',
                [
                    'product_id' => $id,
                    'option_category_name' => 'Kích Cỡ'
                ]
            )->json();

            $this->options["base"] = Http::get(
                Component::$url . 'options-of-product',
                [
                    'product_id' => $id,
                    'option_category_name' => 'Đế Bánh'
                ]
            )->json();

            $this->options["border"] = Http::get(
                Component::$url . 'options-of-product',
                [
                    'product_id' => $id,
                    'option_category_name' => 'Viền Bánh'
                ]
            )->json();

            // Gián giá trị mặc định cho tùy chọn hiện tại
            $this->current_options["size"] = $this->options["size"][0]["name"];
            $this->current_price_modifier["size"] = $this->options["size"][0]["price_modifier"];

            $this->current_options["base"] = $this->options["base"][0]["name"];
            $this->current_price_modifier["base"] = $this->options["base"][0]["price_modifier"];

            $this->current_options["border"] = $this->options["border"][0]["name"];
            $this->current_price_modifier["border"] = $this->options["border"][0]["price_modifier"];
        } else {

            $this->isPizza = false;

            // Gọi api lấy thông tin các tùy chọn của sản phẩm đó gồm (Kích cỡ, Đế bánh, Viên bánh)

            $this->current_options["size"] = null;
            $this->current_price_modifier["size"] = "0";

            $this->current_options["base"] = null;
            $this->current_price_modifier["base"] = "0";

            $this->current_options["border"] = null;
            $this->current_price_modifier["border"] = "0";
        }
    }

    // Phương thức giảm số lượng sản phẩm
    public function decrease()
    {

        // Giảm biến số lượng 1 đơn vị
        if ($this->quantity > 1) {
            $this->quantity--;
        }
        // Cập nhật lại giá sản phẩm ứng với số lượng hiện tại
        $this->product["price"] = number_format(($this->default_price + $this->current_price_modifier["size"] + $this->current_price_modifier["base"] + $this->current_price_modifier["border"]) * $this->quantity, 3, '.', '.');
    }

    // Hàm tăng số lượng sản phẩm
    public function increase()
    {

        // Tăng biến số lượng lên 1 đơn vị
        if ($this->quantity < 100) {
            $this->quantity++;
        }

        // Cập nhật lại giá sản phẩm ứng với số lượng
        $this->product["price"] = number_format(($this->default_price + $this->current_price_modifier["size"] + $this->current_price_modifier["base"] + $this->current_price_modifier["border"]) * $this->quantity, 3, '.', '.');
    }

    // Phương thức tự động cập nhật số lượng khi có sự thay đổi trên trường input số lượng (trường hợp người dùng tự nhập số lượng)
    public function updatedQuantity($value)
    {
        $this->quantity = $value ?: 1; // Gán số lượng bằng 1 nếu trường input trống

        // Giới hạn số lượng sản phẩm <= 100
        if ($value > 100) {
            $this->quantity = 100;
        }

        // cập nhật lại giá
        $this->product["price"] = number_format(($this->default_price + $this->current_price_modifier["size"] + $this->current_price_modifier["base"] + $this->current_price_modifier["border"]) * $this->quantity, 3, '.', '.');
    }

    // Phương thức khi người dùng chọn kích thức sản phẩm
    public function size(string $size, string $price_modifier)
    {

        // Cập nhật lại tùy chọn và phụ phí
        $this->current_options["size"] = $size;
        $this->current_price_modifier["size"] = $price_modifier;

        // Cập nhật lại giá
        $this->product["price"] = number_format(($this->default_price + $this->current_price_modifier["size"] + $this->current_price_modifier["base"] + $this->current_price_modifier["border"]) * $this->quantity, 3, '.', '.');
    }

    // Phương thức khi người dùng chọn đế bánh 
    public function base(string $base)
    {
        // Cập nhật lại tùy chọn và phụ phí
        $this->current_options["base"] = $base;
        $this->current_price_modifier["base"] = '0';
    }

    // Phương thức khi người dùng chọn viền bánh
    public function border(string $border, string $price_modifier)
    {

        // Cập nhật lại tùy chọn và phụ phí
        $this->current_options["border"] = $border;
        $this->current_price_modifier["border"] = $price_modifier;

        // Cập nhật lại giá
        $this->product["price"] = number_format(($this->default_price + $this->current_price_modifier["size"] + $this->current_price_modifier["base"] + $this->current_price_modifier["border"]) * $this->quantity, 3, '.', '.');
    }
    // Phương thức thêm vào giỏ hàng
    public function addToCart()
    {

        $response = Http::post(

            Component::$url . 'carts',
            [
                'product_id' => $this->product["id"],
                'user_id' => 1,
                'quantity' => $this->quantity,
                'size' => $this->current_options["size"],
                'base' => $this->current_options["base"],
                'border' => $this->current_options["border"],
                'total' => str_replace('.', '', $this->product["price"]),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );


        // Nếu thêm vào giỏ hàng thành công
        if ($response->successful()) {

            $this->isAddToCart = true;
            $this->dispatch('updatedCart');
        }
    }

    // Hàm render ra view
    public function render()
    {
        return view('livewire.dish-details');
    }
}
