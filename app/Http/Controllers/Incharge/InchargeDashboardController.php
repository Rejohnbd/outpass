<?php

namespace App\Http\Controllers\Incharge;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InchargeDashboardController extends Controller
{
    public function index()
    {
        $data = Outpass::where('hostel_id', Auth::user()->incharge->hostel_id)->where('hostel_floor_id', Auth::user()->incharge->hostel_floor_id)->get();

        $lastApprovetOutpass = $data->where('status', 1)->pluck('outpass_id')->first();
        $lastRejectedOutpass = $data->where('status', 2)->pluck('outpass_id')->first();
        $lastPendingOutpass = $data->where('status', 0)->pluck('outpass_id')->first();
        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        $totalPendingOutpass = $data->where('status', 0)->count();

        // $allOutpass = Outpass::where('hostel_id', Auth::user()->incharge->hostel_id)->where('hostel_floor_id', Auth::user()->incharge->hostel_floor_id)->orderBy('id', 'desc')->paginate(15);
        $allOutpass = $data;
        return view('incharge.dashboard', compact('lastApprovetOutpass', 'lastRejectedOutpass', 'lastPendingOutpass', 'totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass', 'totalPendingOutpass', 'allOutpass'));
    }

    public function approvalOutpass($id)
    {
        $outpass = Outpass::where('hostel_id', Auth::user()->incharge->hostel_id)->where('hostel_floor_id', Auth::user()->incharge->hostel_floor_id)->where('outpass_id', $id)->where('status', 0)->first();
        if ($outpass) {
            return view('incharge.approval-outpass', compact('outpass'));
        } else {
            toastr()->addError('Failed', 'Something went wrong!');
            return redirect()->route('incharge-dashboard');
        }
    }

    public function outpassApproval(Request $request, $id)
    {
        $outpass = Outpass::where('hostel_id', Auth::user()->incharge->hostel_id)->where('hostel_floor_id', Auth::user()->incharge->hostel_floor_id)->where('id', $id)->where('status', 0)->first();
        if ($outpass) {
            $validate = $request->validate([
                "status"        => "required|in:1,2",
                "sure_status"   => "required|in:0,1",
            ], [
                'status.required'       => 'Please Select Status',
                'status.in'             => 'Please Select Valid Status',
                'sure_status.required'  => 'Please Select Sure Status',
                'sure_status.in'        => 'Please Select Valid Sure Status',
            ]);

            $outpass->status = $request->status;
            $outpass->approval_date_time = now();
            $outpass->notification_status = 1;
            $outpass->action_id = Auth::user()->id;
            $outpass->sure_status = $request->sure_status;
            $outpass->parent_talk = $request->parent_talk;
            $outpass->approval_reason = $request->approval_reason;
            $outpass->teaching_day = $request->teaching_day;
            $outpass->additional_info = $request->additional_info;
            $outpass->save();
            toastr()->addSuccess('Updated Successfully');
            return redirect()->route('incharge-dashboard');
        } else {
            toastr()->addError('Failed', 'Something went wrong!');
            return redirect()->route('incharge-dashboard');
        }
    }

    public function inchargeNotification()
    {
        $notifications = Outpass::where('hostel_id', auth()->user()->incharge->hostel_id)->where('hostel_floor_id', auth()->user()->incharge->hostel_floor_id)->where('status', 0)->get();
        $listNotification = "";
        foreach ($notifications as $notification) {
            $listNotification .= '<div class="media new reLoad"><div class="media-body"><p><strong>' . $notification->user->name . '</strong> requested <strong>' . $notification->outpass_id . '</strong> outpass is <b class="text-warning">Pending</b> status.</p></div></div>';
        }
        return response()->json([
            'status'                => true,
            'total_notification'    => $notifications->count(),
            'list_notification'     => $listNotification
        ]);
    }
}
