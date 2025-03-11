<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Http;

class FunctionController extends Controller
{
    //
    public $api_key = 'wwcDQvb8Ay0aSWt3iiy45D5YHcqjtSzFZgtmQHY5';
         
    public function product_search(Request $request) {

        $product_name = $request->query('product_name');

        $products = Product::where('name', 'LIKE', "%$product_name%")->get();

        return response()->json($products);
    }

    public function count_cart() {

        $carts = Cart::with('product')->get();

        $count_cart = count($carts);

        return response()->json($count_cart);

    }

    public function location_search(Request $request) {

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

    public function reverse_geocode(Request $request) {

        $latlng = $request->query('latlng');

        $results = Http::get('https://rsapi.goong.io/geocode', [
            'latlng' => $latlng,
            'api_key' => $this->api_key

        ])->json();

        return response()->json($results);
    }
}
