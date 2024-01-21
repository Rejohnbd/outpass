<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $todayData = Outpass::where('user_id', Auth::user()->id)->whereDate('created_at', '=', date('Y-m-d'))->get();
        $todayPendingOutpass = $todayData->where('status', 0)->count();
        $todayAcceptedOutpass = $todayData->where('status', 1)->count();
        $todayRejectedOutpass = $todayData->where('status', 2)->count();

        $data = Outpass::where('user_id', Auth::user()->id)->get();
        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        return view('client.dashboard', compact('todayPendingOutpass', 'todayAcceptedOutpass', 'todayRejectedOutpass', 'totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass'));
    }
}
