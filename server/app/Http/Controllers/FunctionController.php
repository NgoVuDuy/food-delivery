<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Http\Resources\PredictionResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductCategory;
use App\Models\User;
use EndlessMiles\Polyline\Polyline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class FunctionController extends Controller
{
    //
    public $api_key = 'wwcDQvb8Ay0aSWt3iiy45D5YHcqjtSzFZgtmQHY5';

    // public function getHomepageImages()
    // {

    //     $images = Product::orderBy('created_at', 'desc')
    //         ->paginate(1, ['image']);

    //     return response()->json($images, 200);
    // }

    public function typical_products(Request $request)
    {
        $per_page = $request->query('per_page');

        $products = Product::paginate($per_page);

        return ProductResource::collection($products);
    }

    // Tìm kiếm sản phẩm
    public function product_search(Request $request)
    {

        $product_name = $request->query('product_name');

        $products = Product::where('name', 'LIKE', "%$product_name%")->get();

        // return response()->json($products);
        return ProductResource::collection($products);
    }

    // Đếm số sản phẩm có trong giỏ hàng
    public function count_cart()
    {

        $carts = Cart::with('product')->get();

        $count_cart = count($carts);

        return response()->json($count_cart);
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
    public function store_location()
    {
        // 10.03202,105.75005;10.03979,105.76169;10.02501,105.74947;10.02732,105.77019

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
    public function directions(Request $request)
    {

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

        $distance = $directions["routes"][0]["legs"][0]["distance"];
        $duration = $directions["routes"][0]["legs"][0]["duration"];


        return response()->json([
            "points" => $coordinates,
            "distance" => [
                "text" => $distance["text"],
                "value" => $distance["value"]
            ],
            "duration" => [
                "text" => $duration["text"],
                "value" => $duration["value"]
            ],
        ]);
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

        // return response()->json($predictions["predictions"]);
        return PredictionResource::collection($predictions["predictions"]);
    }

    // Trả về thông tin chi tiết một địa điểm
    public function place_details(Request $request)
    {

        $place_id = $request->query('place_id');
        $place = Http::get('https://rsapi.goong.io/place/detail', [
            'place_id' => $place_id,
            'api_key' => $this->api_key
        ])->json();

        return response()->json(["location" => $place["result"]["geometry"]["location"]]);
    }
    // Chức năng đăng nhập
    public function login(Request $request)
    {

        $user = User::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            return response()->json(["user" => $user, "message" => "Đăng nhập thành công", "code" => 1]);
        } else {
            return response()->json(["message" => "Đăng nhập thất bại", "code" => 0]);
        }
    }
    //
    public function vnpayCallBack(Request $request)
    {

        $data = $request->all();

        // ProductCategory::insert([

        //     [
        //         'name' => $portClient,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],

        // ]);

        return redirect("http://localhost:8000/order");
    }
}
