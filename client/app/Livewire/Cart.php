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
    public $carts;

    #[Session(key: 'total')]
    public $total; // Tổng tiền của tất cả sản phẩm

    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    public  $place_id = null;

    // #[Session(key: 'carts-copy')]
    // public $carts_copy; // Lưu lại session cũ sau khi người dùng đã đăng nhập

    // Phương thức xây dựng
    public function mount()
    {

        // $this->carts = null;
        // $this-> infor_delivery = null;
        // $this->user = null;
        // $this->carts_copy = null;
        // dd($this->carts);

        if (!empty($this->infor_delivery)) {

            $this->delivery_location = $this->infor_delivery['place_name'];
            $this->place_id = $this->infor_delivery['place_id'];
            $this->customer_name = $this->infor_delivery['name'];
            $this->customer_phone = $this->infor_delivery['phone'];
        }
        // Nếu đã đăng nhập
        if (!empty($this->user)) {

            $this->carts = Http::get(Component::$url . 'carts')->json();
        }

        // Nếu có sản phẩm
        if (!empty($this->carts)) {

            // Set giá trị mặc định
            foreach ($this->carts as $index => $cart) {

                $this->default_price[$index] = (float) $cart["total"] / $cart["quantity"];
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

        // Giá của sản phẩm
        $this->carts[$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');

        // 
        $this->total_item[$index] = $this->carts[$index]["total"];

        // Cập nhật lại tổng giá
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
        $this->carts[$index]["quantity"] = $this->default_quantity[$index];

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
        $this->carts[$index]["quantity"] = $this->default_quantity[$index];

        $this->total_item[$index] = $this->carts[$index]["total"];

        $this->total = number_format(array_sum(array_map(function ($item) {
            return str_replace('.', '', $item);
        }, $this->total_item)), 0, '.', '.');
    }

    public function delete_cart_item(string $cart_item_id, string $index)
    {
        // dd($cart_item_id);
        // Kiểm tra xem item có tồn tại không trước khi xóa
        if (!isset($this->carts[$cart_item_id])) {
            return;
        }

        // Xóa item khỏi mảng carts
        unset($this->carts[$cart_item_id]);

        // Nếu giỏ hàng trống sau khi xóa
        if (empty($this->carts)) {
            $this->isEmptyCart = true;
        } else {
            unset($this->default_price[$cart_item_id]);
            unset($this->default_quantity[$cart_item_id]);
            unset($this->total_item[$cart_item_id]);
        }

        // Nếu người dùng đã đăng nhập, gửi request API để cập nhật server
        if (!empty($this->user)) {
            $response = Http::delete(Component::$url . 'carts/' . $index);

            if ($response->successful()) {
                $this->dispatch('updateCountCart');
            }
        }

        // Nếu giỏ hàng vẫn còn sản phẩm, cập nhật lại mảng
        if (!empty($this->carts)) {
            $this->carts = array_values($this->carts);
            $this->default_price = array_values($this->default_price);
            $this->default_quantity = array_values($this->default_quantity);
            $this->total_item = array_values($this->total_item);

            $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
        }
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

        if (!empty($this->place_id)) {

            if (!empty($this->predictions)) {

                // kiểm tra input có hợp lệ không
                $descriptions = array_column($this->predictions['data'], 'description'); // Lấy trường tên địa điểm trong mảng
                $index = array_search($this->location_search, $descriptions); // tìm có trường input có trùng với giá trị trong mảng không

                // dd( $descriptions);

                if ($index !== false) {

                    // dd($this->predictions);

                    $this->delivery_location = $this->location_search;
                }
            } else {
                $this->delivery_location = $this->location_search;
            }
        }
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

    // nút thanh toán
    public function payment()
    {
        $this->validate();

        if (empty($this->delivery_location)) {

            $this->dispatch("notLocation");
        } else {

            // Gọi api để chuyển đổi place id thành vĩ độ kinh độ
            $location = Http::get(Component::$url . 'place-details', [
                "place_id" => $this->place_id
            ])->json();

            $this->infor_delivery = [

                "name" => $this->customer_name,
                "phone" => $this->customer_phone,
                "place_name" => $this->delivery_location,
                "place_id" => $this->place_id,
                "from" => null,
                "location" => $location["location"]

            ];

            // dd($this->infor_delivery);

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
