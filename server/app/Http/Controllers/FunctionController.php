<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use EndlessMiles\Polyline\Polyline;
use Illuminate\Support\Facades\Http;

class FunctionController extends Controller
{
    //
    public $api_key = 'wwcDQvb8Ay0aSWt3iiy45D5YHcqjtSzFZgtmQHY5';

    // Tìm kiếm sản phẩm
    public function product_search(Request $request)
    {

        $product_name = $request->query('product_name');

        $products = Product::where('name', 'LIKE', "%$product_name%")->get();

        return response()->json($products);
    }

    // Đếm số sản phẩm có trong giỏ hàng
    public function count_cart()
    {

        $carts = Cart::with('product')->get();

        $count_cart = count($carts);

        return response()->json($count_cart);
    }

    // Tìm kiếm địa chỉ giao hàng
    public function location_search(Request $request)
    {

        $input = $request->query('input');
        $location = '10.02119,105.76484';
        $limit = 10;
        $predictions = Http::get('https://rsapi.goong.io/place/autocomplete', [
            'input' => $input,
            'location' => $location,
            'limit' => $limit,
            'api_key' => $this->api_key
        ])->json();

        return response()->json($predictions, 200);
    }


    // Đổi tọa độ thành địa điểm
    public function reverse_geocode(Request $request)
    {

        $latlng = $request->query('latlng');

        $results = Http::get('https://rsapi.goong.io/geocode', [
            'latlng' => $latlng,
            'api_key' => $this->api_key

        ])->json();

        return response()->json($results);
    }
    // Lấy sản phẩm dựa trên danh mục
    public function category(Request $request)
    {
        $per_page = $request->query('per_page');
        $category_id = $request->query('category_id');

        $products = Product::where('product_categories_id', $category_id)->paginate($per_page);

        return ProductResource::collection($products);
    }
    // Trả về thông tin cách chi nhánh cửa hàng
    public function store_location() {

        $store_locations = [
            [
                'name' => 'Chi nhánh Nguyễn Văn Linh',
                'open' => '9AM - 10PM',
                'address' => '334 Nguyễn Văn Linh, An Khánh, Ninh Kiều, Cần Thơ',
                'latitude' => 10.03202,
                'longitude' => 105.75005,
                
            ],
            [
                'name' => 'Chi nhánh Nguyễn Văn Cừ',
                'open' => '9AM - 10PM',
                'address' => '132 Đường Nguyễn Văn Cừ, Ninh Kiều, Cần Thơ',
                'latitude' => 10.03979,
                'longitude' => 105.76169,
                
            ],
            [
                'name' => 'Chi nhánh Trần Hoàng Na',
                'open' => '9AM - 10PM',
                'address' => '34 Trần Hoàng Na, Phường An Khánh, Ninh Kiều, Cần Thơ',
                'latitude' => 10.02501,
                'longitude' => 105.74947,
                
            ],
            [
                'name' => 'Chi nhánh 3 tháng 2',
                'open' => '9AM - 10PM',
                'address' => '146A 3 Tháng 2, Xuân Khánh, Ninh Kiều, Cần Thơ',
                'latitude' => 10.02732,
                'longitude' => 105.77019,
                
            ],
        ];

        return response()->json($store_locations, 201);
    }
    // Trả về đường đi từ một điểm đến  một hay nhiều điểm
    public function directions(Request $request) {

        $origin = $request->query('origin');
        $destination = $request->query('destination');
        $vehicle = $request->query('vehicle');
        $api_key = $this->api_key;

        $directions = Http::get('https://rsapi.goong.io/direction', [
            'origin' => $origin,
            'destination' => $destination,
            'vehicle' => $vehicle,
            'api_key' => $api_key
        ])->json();

        $polyline = new Polyline();
        
        $coordinates = $polyline->decode($directions["routes"][0]["overview_polyline"]["points"]);
        

        return response()->json(["points" => $coordinates]);
    }
}
