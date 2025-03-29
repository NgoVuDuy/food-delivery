<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function index() {

        $shippers = Shipper::with('user')->get();

        return response()->json($shippers);
    }

    //
    public function store(Request $request) {

        $data = $request->all();

        $shipper = Shipper::updateOrCreate(

            ['shipper_id' => $data['shipper_id']],
            $data,
        );

        return response()->json($shipper);

    }

    public function show(string $id) {

        $shipper = Shipper::find($id);

        return response()->json($shipper);;
    }

    public function update(Request $request, string $id) {

        $shipper = Shipper::find($id);

        if(!$shipper) {

            return;
        }

        $status = $request->get('status', null);

        if(!empty($status)) {

            $shipper->status = $status;

            $shipper->save();
        }

        return response()->json($shipper);
    }
}
