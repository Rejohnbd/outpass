<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = Outpass::all();

        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        return view('admin.dashboard', compact('totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass'));
    }
}
