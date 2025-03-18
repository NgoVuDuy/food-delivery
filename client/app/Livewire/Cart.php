<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;


#[Title('Giỏ hàng')]
class Cart extends Component
{
    // public $carts; // Các sản phẩm trong giỏ hàng
    public $default_price = []; // Giá gốc của từng sản phẩm (SL = 1)
    public $default_quantity = []; // Số lượng ban đầu của từng sản phẩm
    public $total_item = []; // Tổng tiền của từng sản phẩm

    public $isEmptyCart = false; // Kiểm tra giỏ hàng rỗng

    public $location_search = ''; // Trường input chứa từ khóa tìm kiếm
    public $predictions = []; // Chứa các kết quả tìm kiếm

    public $delivery_location = ''; // Địa điểm giao hàng được chọn
    public $latitude = 0; // Lưu vĩ độ hiện tại của khách hàng
    public $longitude = 0; // Lưu kinh độ hiện tại của khách hàng

    #[Validate('required|string|min:8|max:16|regex:/^[\w]+$/')]
    public $customer_name = ''; // Tên khách hàng

    #[Validate('required|string|min:8|max:16|regex:/^(\+?\d{1,4}[-.\s]?)?(\d{8,15})$/|')]
    public $customer_phone = ''; // Số điện thoại khách hàng

    // public $customer_name_input = ''; // Dữ liệu tên nhập vào trường input
    // public $customer_phone_input = ''; // Dữ liệu số điện thoại nhập vào trường input

    #[Session(key: 'user')]
    public $user; // Được xem là biến session

    #[Session(key: 'cartItems')]
    public $cartItems;

    #[Session(key: 'carts')]
    public $carts;

    #[Session(key: 'total')]
    public $total; // Tổng tiền của tất cả sản phẩm

    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    public  $place_id;

    // Phương thức xây dựng
    public function mount()
    {

        // Lấy các sản phẩm trong giỏ hàng
        // $this->carts = Http::get(Component::$url . 'carts')->json();
        $this->carts = $this->cartItems;

        // Chuyển đổi Carbon thành chuỗi datetime
        $json = json_encode(array_map(function ($item) {
            $item['created_at'] = $item['created_at']->toDateTimeString();
            $item['updated_at'] = $item['updated_at']->toDateTimeString();
            return $item;
        },  $this->carts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // dd($this->carts);

        // Nếu có sản phẩm
        if (!empty($this->carts)) {

            // Set giá trị mặc định
            foreach ($this->carts as $index => $cart) {

                $this->default_price[$index] = $cart["total"] / $cart["quantity"];
                $this->default_quantity[$index] = $cart["quantity"];
                $this->total_item[$index] = $cart["total"];
            }

            // Tính tổng tiền cần thanh toán
            $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
        } else {

            // Giỏ hàng rỗng
            $this->isEmptyCart = true;
        }
    }

    // Phương thức giảm số lượng sản phẩm
    public function decrease(string $index)
    {

        if ($this->default_quantity[$index] > 1) {
            $this->default_quantity[$index]--;
        }

        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        $this->total_item[$index] = $this->carts[$index]["total"];

        $this->total = number_format(array_sum(array_map(function ($item) {
            return str_replace('.', '', $item);
        }, $this->total_item)), 0, '.', '.');
    }

    // Phương thức tăng số lượng sản phẩm
    public function increase(string $index)
    {
        if ($this->default_quantity[$index] < 100) {
            $this->default_quantity[$index]++;
        }

        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        $this->total_item[$index] = $this->carts[$index]["total"];

        $this->total = number_format(array_sum(array_map(function ($item) {
            return str_replace('.', '', $item);
        }, $this->total_item)), 0, '.', '.');
    }

    // hàm cập nhật lại số lượng khi có sự thay đổi trên trường input số lượng - người dùng tự nhập số lượng
    public function updatedDefaultQuantity($value, $index)
    {

        $this->default_quantity[$index] = $value ?: 1;

        if ($this->default_quantity[$index] > 100) {
            $this->default_quantity[$index] = 100;
        }

        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        $this->total_item[$index] = $this->carts[$index]["total"];

        $this->total = number_format(array_sum(array_map(function ($item) {
            return str_replace('.', '', $item);
        }, $this->total_item)), 0, '.', '.');
    }

    // Xóa một sản phẩm
    public function delete_cart_item(string $cart_item_id)
    {

        unset($this->carts[$cart_item_id]);
        unset($this->cartItems[$cart_item_id]);


        if (empty($this->carts)) {
            $this->isEmptyCart = true;
        } else {

            unset($this->default_price[$cart_item_id]);
            unset($this->default_quantity[$cart_item_id]);
            unset($this->total_item[$cart_item_id]);
        }

        // $response = Http::delete(Component::$url . 'carts' . '/' . $cart_item_id);

        // dd($cart_item_id);

        // if ($response->successful()) {

        // $this->dispatch('updateCountCart');

        // foreach ($this->carts as $index => $cart) {

        //     if ($cart[$index] == $cart_item_id) {

        //         unset($this->carts[$index]);

        //         if (empty($this->carts)) {
        //             $this->isEmptyCart = true;
        //         } else {

        //             unset($this->default_price[$index]);
        //             unset($this->default_quantity[$index]);
        //             unset($this->total_item[$index]);
        //         }
        //         break;
        //     }
        // }

        if (!empty($this->carts)) {

            $this->carts = array_values($this->carts);
            $this->default_price = array_values($this->default_price);
            $this->default_quantity = array_values($this->default_quantity);
            $this->total_item = array_values($this->total_item);

            $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
        }
        // } 
        // else {
        // }
    }

    // Phương thức tìm kiếm địa điểm
    public function updatedLocationSearch(string $value)
    {

        $this->predictions = Http::get(Component::$url . 'location-search', [
            'input' => $this->location_search,

        ])->json();

    }

    // Cập nhật địa điểm lên trường input
    public function setLocation(string $location, string $place_id)
    {
        $this->location_search = $location;

        $this->place_id = $place_id;
    }

    // Cập nhật địa điểm giao hàng
    public function update_location()
    {
        $this->delivery_location = $this->location_search;
    }

    // Lấy địa điểm hiện tại
    #[On('current_location')]
    public function current_location()
    {

        $results = Http::get(Component::$url . 'reverse-geocode', [
            'latlng' => $this->latitude . ',' . $this->longitude
        ])->json();

        $this->location_search = $results["results"][0]["formatted_address"];

        $this->place_id = $results["results"][0]["place_id"];
    }

    // public function update_customer_name()
    // {

    //     $this->customer_name = $this->customer_name_input;
    // }

    // public function update_customer_phone()
    // {

    //     $this->customer_phone = $this->customer_phone_input;
    // }
    // nút thanh toán
    public function payment()
    {   
        $this->validate();

        if(empty($this->delivery_location)) {

            $this->dispatch("notLocation");
        } else {

            $this->infor_delivery = [
    
                "name" => $this->customer_name,
                "place_name" => $this->delivery_location,
                "phone" => $this->customer_phone,
                "place_id" => $this->place_id,
    
            ];

            return $this->redirect('/checkout', navigate: true);
        }

    }
    public function render()
    {
        return view('livewire.cart');
    }

    public function messages()
    {

        return [
            'customer_name.required' => 'Vui lòng nhập tên người dùng.',
            'customer_name.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'customer_name.max' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'customer_name.regex' => 'Tên người dùng không được chứa ký tự đặc biệt hoặc khoảng trắng.',

            'customer_phone.required' => 'Vui lòng nhập số điện thoại.',
            'customer_phone.regex' => 'Số điện thoại không đúng định dạng.',
            'customer_phone.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'customer_phone.max' => 'Độ dài phải từ 8 đến 16 ký tự.',

        ];
    }
}
