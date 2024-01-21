<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $todayData = Outpass::whereDate('created_at', '=', date('Y-m-d'))->get();
        $todayPendingOutpass = $todayData->where('status', 0)->count();
        $todayAcceptedOutpass = $todayData->where('status', 1)->count();
        $todayRejectedOutpass = $todayData->where('status', 2)->count();


        $data = Outpass::all();

        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        return view('admin.dashboard', compact('todayPendingOutpass', 'todayAcceptedOutpass', 'todayRejectedOutpass', 'totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass'));
    }
}
