<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class DataController extends Controller
{

    // public function retrieveToken(Request $request) {

    //     $username = $request->get('username');
    //     $password = $request->get('password');

    //     // validate username and password

        

    // }

    public function retrieveData() {

        // $get_report = Report::orderBy('created_at', 'DESC')->get();
        $get_report = Report::orderBy('created_at')->get();

        $data = [];

        foreach ($get_report as $report) {
            array_push($data, [
                'cash' => $report->cash,
                'gcash' => $report->gcash,
                'total_remittance' => $report->total_remittance,
                'date' => $report->date,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
