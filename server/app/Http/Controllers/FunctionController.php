<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Http\Resources\PredictionResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductCategory;
use App\Models\Shipper;
use App\Models\User;
use EndlessMiles\Polyline\Polyline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function count_cart(Request $request)
    {

        $user_id = $request->query('user_id');

        // Tìm giỏ hàng của user
        $cart = Cart::with('cartItems')->where('user_id', $user_id)->first();

        // Nếu không có giỏ hàng, trả về 0
        if (!$cart) {
            return response()->json(0);
        }

        // Đếm số lượng sản phẩm trong giỏ hàng
        $count_cart = $cart->cartItems->count();

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

    // Trả về đường đi từ một điểm đến  một hay nhiều điểm
    public function many_directions(Request $request)
    {

        $origin = $request->query('origin');
        $destination = $request->query('destination');
        $vehicle = $request->query('vehicle');
        $api_key = $this->api_key;

        $distance = [];
        $duration = [];

        $directions = Http::get('https://rsapi.goong.io/direction', [
            'origin' => $origin,
            'destination' => $destination,
            'vehicle' => $vehicle,
            'api_key' => $api_key
        ])->json();

        $polyline = new Polyline();

        $coordinates = $polyline->decode($directions["routes"][0]["overview_polyline"]["points"]);

        foreach ($directions["routes"][0]["legs"] as $legs) {
            $distance[] = $legs["distance"];
            $duration[] = $legs["duration"];
        }

        // $distance = $directions["routes"][0]["legs"][0]["distance"];
        // $duration = $directions["routes"][0]["legs"][0]["duration"];

        return response()->json([
            "points" => $coordinates,
            "distance" => $distance,
            "duration" => $duration,
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

        $user = User::with('shipper')->where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            return response()->json(["user" => $user, "message" => "Đăng nhập thành công", "code" => 1]);
        } else {
            return response()->json(["message" => "Đăng nhập thất bại", "code" => 0]);
        }
    }
    // Lấy ra số order của từng shipper
    public function shipper_orders()
    {

        $shippers = Shipper::withCount([
            'orders' => function ($query) {
                $query->where('status', 'completed'); // Chỉ đếm đơn đã hoàn thành
            },
        ])
            ->orderBy('orders_count', 'asc') // Sắp xếp theo số đơn đã hoàn thành
            ->first();
        
        return response()->json($shippers);
    }
    //
    public function vnpayCallBack(Request $request)
    {

        $data = $request->all();

        if ($data["vnp_ResponseCode"] == "00") {

            // Lưu dữ liệu vào database
            $vnp_Amount = $data["vnp_Amount"];
            $vnp_BankCode = $data["vnp_BankCode"];
            $vnp_BankTranNo = $data["vnp_BankTranNo"];
            $vnp_CardType = $data["vnp_CardType"];
            $vnp_OrderInfo = $data["vnp_OrderInfo"];
            $vnp_PayDate = $data["vnp_PayDate"];
            $vnp_ResponseCode = $data["vnp_ResponseCode"];
            $vnp_TmnCode = $data["vnp_TmnCode"];
            $vnp_TransactionNo = $data["vnp_TransactionNo"];
            $vnp_TransactionStatus = $data["vnp_TransactionStatus"];
            $vnp_TxnRef = $data["vnp_TxnRef"];
            $vnp_SecureHash = $data["vnp_SecureHash"];

            $payment = Payment::create($data);

            $url = 'http://localhost:8000/success' . '?query=' . $payment['vnp_TxnRef'];

            return redirect($url);
        } else {

            $url = 'http://localhost:8000/error';

            return redirect($url);
        }
    }
}
