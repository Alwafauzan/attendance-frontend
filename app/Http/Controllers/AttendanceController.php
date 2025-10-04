<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function logs(Request $request)
    {
        $query = [];

        if ($request->has('date')) {
            $query['date'] = $request->date;
        }

        if ($request->has('department')) {
            $query['department'] = $request->department;
        }

        $response = Http::get('http://127.0.0.1:8000/api/attendance/logs', $query);
        $logs = $response->json();

        return view('attendance.logs', compact('logs'));
    }

}
