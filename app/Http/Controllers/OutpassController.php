<?php

namespace App\Http\Controllers;

use App\Models\Outpass;
use Illuminate\Http\Request;

class OutpassController extends Controller
{
    public function checkout(Request $request)
    {
        if ($request->query('outpass')) {
            $outpass = Outpass::where('outpass_id', $request->query('outpass'))->where('status', 1)->where('start_date_time', '<=', now())->where('end_date_time', '>=', now())->whereNull('check_out')->first();
            if ($outpass) {
                return view('web.checkout', compact('outpass'));
            } else {
                $outpass_status = 'notfound';
                return view('web.checkout', compact('outpass_status'));
            }
        } else {
            return view('web.checkout');
        }
    }

    public function checkoutSubmit(Request $request)
    {
        $outpass = Outpass::where('outpass_id', $request->outpassId)->where('status', 1)->where('start_date_time', '<=', now())->where('end_date_time', '>=', now())->first();
        if ($outpass) {
            if (is_null($outpass->check_out)) {
                $outpass->check_out = now();
                $outpass->save();

                return response()->json([
                    'status' => 'success',
                    'userImage' => $outpass->user->userDetails->getAvaterUrl($outpass->user->userDetails->picture),
                    'message' => 'Outpass checked out successfully'
                ]);
            } else {
                return response()->json(['status' => 'used', 'message' => 'Outpass Already Used']);
            }
        } else {
            return response()->json(['status' => 'notfound', 'message' => 'Outpass not found']);
        }
    }

    public function checkin(Request $request)
    {
        if ($request->query('outpass')) {
            $outpass = Outpass::where('outpass_id', $request->query('outpass'))->whereNotNull('check_out')->where('status', 1)->first();
            if ($outpass) {
                return view('web.checkin', compact('outpass'));
            } else {
                $outpass_status = 'notfound';
                return view('web.checkin', compact('outpass_status'));
            }
        } else {
            return view('web.checkin');
        }
    }

    public function checkInSubmit(Request $request)
    {
        $outpass = Outpass::where('outpass_id', $request->outpassId)->where('status', 1)->where('start_date_time', '<=', now())->where('end_date_time', '>=', now())->whereNotNull('check_out')->first();
        if ($outpass) {
            if (is_null($outpass->check_in)) {
                $outpass->check_in = now();
                $outpass->save();

                return response()->json([
                    'status' => 'success',
                    'userImage' => $outpass->user->userDetails->getAvaterUrl($outpass->user->userDetails->picture),
                    'message' => 'Outpass checked out successfully'
                ]);
            } else {
                return response()->json(['status' => 'used', 'message' => 'Outpass Already Used']);
            }
        } else {
            return response()->json(['status' => 'notfound', 'message' => 'Outpass not found']);
        }
    }
}
