<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function retrieveOrderDetails() {

        
        $get_order_details = OrderDetails::orderBy('created_at')->get();

        $data = [];

        foreach ($get_order_details as $order_details) {
            array_push($data, [
                'dish_id' => $order_details->dish_id,
                'created_at' => $order_details->created_at,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
