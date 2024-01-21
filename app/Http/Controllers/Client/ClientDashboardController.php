<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $data = Outpass::where('user_id', Auth::user()->id)->get();

        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        return view('client.dashboard', compact('totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass'));
    }
}
