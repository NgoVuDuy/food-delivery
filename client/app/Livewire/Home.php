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
    public $index; // index của ảnh trang chủ
    public $current_image; // ảnh hiện tại
    public $page_total; // tổng số trang
    public $images = [];

    // món ăn tiêu biểu
    public $current_products; // các sản phẩm đang hiển thị

    // Menu nổi bật
    public $menu = [];

    public function mount()
    {

        $this->images[0] = 'images/products/pizzas/pizza-tom.jpg';
        $this->images[1] = 'images/products/pizzas/pizza-rau-cu.jpg';
        $this->images[2] = 'images/products/pizzas/pizza-pho-mai.jpg';

        //homepage-images
        $this->index = 0;
        $this->current_image = $this->images[0];

        $this->current_products = Http::get(
            Component::$url . 'typical-products',
            [
                'per_page' => 4,
                'page' => 1
            ]
        )->json();

        // Menu nổi bật
        $this->menu = [
            [
                'name' => 'Pizza Thịt Heo Xông Khói',
                'price' => "129.000đ",
                'description' => 'Thịt heo xông khói nhập khẩu mang hương vị tuyệt vời',
                'image' => 'images/products/pizzas/pizza-thit-xong-khoi.jpg',
            ],
            [
                'name' => 'Pizza Rau Củ',
                'price' => "89.123đ",
                'description' => 'Pizza rau củ tươi mới, có thể dùng chay',
                'image' => 'images/products/pizzas/pizza-rau-cu.jpg',
            ],
            [
                'name' => 'Pizza Phô Mai',
                'price' => "159.000đ",
                'description' => 'Pizza phô mai tươi nhập khẩu từ Pháp',
                'image' => 'images/products/pizzas/pizza-pho-mai.jpg',
            ],
            [
                'name' => 'Pizza Xúc Xích',
                'price' => "99.000đ",
                'description' => 'Pizza xúc xích nhập khẩu từ Đức',
                'image' => 'images/products/pizzas/pizza-xuc-xich.jpg',
            ],
            [
                'name' => 'Pizza Tôm',
                'price' => "119.000đ",
                'description' => 'Pizza tôm tươi được chế biến trong ngày',
                'image' => 'images/products/pizzas/pizza-tom.jpg',
            ],
            [
                'name' => 'Pizza Thịt Cừu',
                'price' => "189.000đ",
                'description' => 'Pizza thịt cừu mang hương vị đặc trưng',
                'image' => 'images/products/pizzas/pizza-thit-cuu.jpg',
            ],
            [
                'name' => 'Pizza Xúc Xích Phô Mai Tươi',
                'price' => "189.000đ",
                'description' => 'Pizza xúc xích phô mai dễ ăn, phù hợp cho nhiều lứa tuổi',
                'image' => 'images/products/pizzas/pizza-xuc-xich-pho-mai-tuoi.jpg',
            ],
            //mix
            [
                'name' => 'Pizza Phô Mai Xúc Xích',
                'price' => "139.000đ",
                'description' => 'Sự kết hợp giữa vị tôm và xúc xích',
                'image' => 'images/products/pizzas/mix/pizza-pho-mai-xuc-xich.jpg',
            ],
        ];

    }
    public function paginate_img(string $page)
    {

        $this->index = $page;

        $this->current_image = $this->images[$this->index];
    }

    // quay lại ảnh trước đó
    public function prev()
    {

        $this->index--;

        if ($this->index < 0) {

            $this->index = count($this->images) - 1;
        }

        $this->current_image = $this->images[$this->index];
    }
    // ảnh tiếp theo
    public function next()
    {

        $this->index++;

        if ($this->index > count($this->images) - 1) {
            $this->index = 0;
        }

        $this->current_image = $this->images[$this->index];
    }

    // Menu nổi bật
    public function typical_dish_pagination(string $page)
    {

        $this->current_products = Http::get(
            Component::$url . 'typical-products',
            [
                'per_page' => 4,
                'page' => $page
            ]
        )->json();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
