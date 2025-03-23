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

    #[Validate('required|string|min:8|max:16')]
    public $customer_name = ''; // Tên khách hàng

    #[Validate('required|string|min:8|max:16|regex:/^(\+?\d{1,4}[-.\s]?)?(\d{8,15})$/|')]
    public $customer_phone = ''; // Số điện thoại khách hàng

    // public $customer_name_input = ''; // Dữ liệu tên nhập vào trường input
    // public $customer_phone_input = ''; // Dữ liệu số điện thoại nhập vào trường input

    #[Session(key: 'user')]
    public $user; // Được xem là biến session

    #[Session(key: 'carts')]
    public $carts;

    #[Session(key: 'total')]
    public $total; // Tổng tiền của tất cả sản phẩm

    #[Session(key: 'infor-delivery')]
    public $infor_delivery;

    public  $place_id = null;

    // Phương thức xây dựng
    public function mount()
    {

            // dd($this->carts); 
            // $this->carts = null;

        if (!empty($this->infor_delivery)) {

            $this->delivery_location = $this->infor_delivery['to']['place_name'];
            $this->place_id = $this->infor_delivery['to']['place_id'];
            $this->customer_name = $this->infor_delivery['name'];
            $this->customer_phone = $this->infor_delivery['phone'];
        }

        // Nếu đã đăng nhập, lấy giỏ hàng của người dùng
        if (!empty($this->user)) {

            // Lấy giỏ hàng
            $this->carts = Http::get(Component::$url . 'carts', [
                'user_id' => $this->user["id"]
                
            ])->json();

            // dd($this->carts);


            // Lấy địa chỉ người dùng
            $address = Http::get(Component::$url . 'addresses', [
                'user_id' => $this->user["id"],

            ])->json();

            if (!empty($address)) {

                $this->delivery_location = $address[0]['place_name'];
                $this->place_id = $address[0]['place_id'];
                $this->customer_name = $address[0]['customer_name'];
                $this->customer_phone = $address[0]['customer_phone'];
            } else {

                // $this->delivery_location = $address[0]['place_name'];
                // $this->place_id = $address[0]['place_id'];

                $this->customer_name = $this->user["name"];
                $this->customer_phone = $this->user["phone"];
            }
        }

        // Nếu có sản phẩm
        if (!empty($this->carts["cart_items"])) {

            // Set giá trị mặc định
            foreach ($this->carts['cart_items'] as $index => $cart_items) {
                
                $this->default_price[$index] = $cart_items["product"]["price"];
                $this->default_quantity[$index] = $cart_items["quantity"];
                $this->total_item[$index] = $cart_items["total"];
            }
            // dd($this->default_price);
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
        $this->carts["cart_items"][$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 0, '.', '.');
        $this->total_item[$index] =  $this->carts["cart_items"][$index]["total"];
        
        $this->carts["cart_items"][$index]["quantity"] = $this->default_quantity[$index];

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

        $this->carts["cart_items"][$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 0, '.', '.');
        $this->total_item[$index] =  $this->carts["cart_items"][$index]["total"];
        
        $this->carts["cart_items"][$index]["quantity"] = $this->default_quantity[$index];


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

        $this->carts["cart_items"][$index]["total"] = number_format($this->default_price[$index] * $this->default_quantity[$index], 3, '.', '.');
        $this->total_item[$index] =  $this->carts["cart_items"][$index]["total"];
        
        $this->carts[$index]["quantity"] = $this->default_quantity[$index];

        $this->total = number_format(array_sum(array_map(function ($item) {
            return str_replace('.', '', $item);
        }, $this->total_item)), 0, '.', '.');
    }

    public function delete_cart_item(string $index, string $cart_item_id)
    {
        // dd($cart_item_id);
        // Kiểm tra xem item có tồn tại không trước khi xóa
        if (!isset($this->carts["cart_items"][$index])) {
            return;
        }

        // Xóa item khỏi mảng carts
        unset($this->carts["cart_items"][$index]);

        // Nếu giỏ hàng trống sau khi xóa
        if (empty($this->carts["cart_items"])) {
            $this->isEmptyCart = true;
        } else {
            unset($this->default_price[$index]);
            unset($this->default_quantity[$index]);
            unset($this->total_item[$index]);
        }

        // Nếu người dùng đã đăng nhập, gửi request API để cập nhật server
        if (!empty($this->user)) {

            $response = Http::delete(Component::$url . 'cart-items/' . $index);

            if ($response->successful()) {

                $this->dispatch('updateCountCart');
            }
        }

        // Nếu giỏ hàng vẫn còn sản phẩm, cập nhật lại mảng
        if (!empty($this->carts["cart_items"])) {
            $this->carts["cart_items"] = array_values($this->carts["cart_items"]);
            $this->default_price = array_values($this->default_price);
            $this->default_quantity = array_values($this->default_quantity);
            $this->total_item = array_values($this->total_item);

            $this->total = number_format(array_sum($this->total_item), 3, '.', '.');
        }

        $this->dispatch('updatedCart');
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

        // có chọn các địa điểm
        if (!empty($this->place_id)) {

            // có dữ liệu
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
                
                // "user_id" => null,
                // "name" => $this->customer_name, // Tên khách hàng
                // "phone" => $this->customer_phone, // Số điện thoại khách hàng
                // "place_name" => $this->delivery_location, // Tên địa chỉ giao đến
                // "place_id" => $this->place_id, // Thông tin địa chỉ giao đến (vĩ độ kinh độ)
                // "from" => null, // Chi nhánh làm nơi giao hàng (tên, vĩ độ, kinh độ)
                // "location" => $location["location"], // kinh độ vĩ độ của khách hàng
                // "points" => null // tọa độ dùng để vẽ đường đi

                "user_id" => null,
                "name" => $this->customer_name, // Tên khách hàng
                "phone" => $this->customer_phone, // Số điện thoại khách hàng
                "from" => null, // Chi nhánh làm nơi giao hàng (tên, vĩ độ, kinh độ)
                "to" => [
                    "place_name" => $this->delivery_location,
                    "place_id" => $this->place_id, // Thông tin địa chỉ giao đến (vĩ độ kinh độ)
                    "lat" => $location["location"]["lat"],
                    "lng" => $location["location"]["lng"]
                ], // kinh độ vĩ độ của khách hàng
                "points" => null // tọa độ dùng để vẽ đường đi

            ]; // => sẽ lưu vào bảng orders

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
            // 'customer_name.regex' => 'Tên người dùng không được chứa ký tự đặc biệt hoặc khoảng trắng.',

            'customer_phone.required' => 'Vui lòng nhập số điện thoại.',
            'customer_phone.regex' => 'Số điện thoại không đúng định dạng.',
            'customer_phone.min' => 'Độ dài phải từ 8 đến 16 ký tự.',
            'customer_phone.max' => 'Độ dài phải từ 8 đến 16 ký tự.',

        ];
    }
}
