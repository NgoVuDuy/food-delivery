<?php

namespace App\Http\Controllers;

use App\Models\StoreLocation;
use Illuminate\Http\Request;

class StoreLocationController extends Controller
{
    //
    public function index() {
        $store_locations = StoreLocation::all();

        return response()->json($store_locations);
    }
}
