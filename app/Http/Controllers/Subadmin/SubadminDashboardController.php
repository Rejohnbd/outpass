<?php

namespace App\Http\Controllers\Subadmin;

use App\Exports\SubdminClientExport;
use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubadminDashboardController extends Controller
{
    public function index()
    {
        $data = Outpass::where('hostel_id', Auth::user()->subadmin->hostel_id)->orderBy('id', 'desc')->get();
        $lastApprovetOutpass = $data->where('status', 1)->pluck('outpass_id')->first();
        $lastRejectedOutpass = $data->where('status', 2)->pluck('outpass_id')->first();
        $lastPendingOutpass = $data->where('status', 0)->pluck('outpass_id')->first();
        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        $totalPendingOutpass = $data->where('status', 0)->count();

        $allOutpass = $data;
        return view('subadmin.dashboard', compact('lastApprovetOutpass', 'lastRejectedOutpass', 'lastPendingOutpass', 'totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass', 'totalPendingOutpass', 'allOutpass'));
    }

    public function approvalOutpass($id)
    {
        $outpass = Outpass::where('hostel_id', Auth::user()->subadmin->hostel_id)->where('outpass_id', $id)->where('status', 0)->first();
        if ($outpass) {
            return view('subadmin.approval-outpass', compact('outpass'));
        } else {
            toastr()->addError('Failed', 'Something went wrong!');
            return redirect()->route('admindashboard');
        }
    }

    public function outpassApproval(Request $request, $id)
    {
        $outpass = Outpass::where('hostel_id', Auth::user()->subadmin->hostel_id)->where('id', $id)->where('status', 0)->first();
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
            return redirect()->route('admindashboard');
        } else {
            toastr()->addError('Failed', 'Something went wrong!');
            return redirect()->route('admindashboard');
        }
    }

    public function subadminNotification()
    {
        $notifications = Outpass::where('hostel_id', auth()->user()->subadmin->hostel_id)->where('status', 0)->get();
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

    public function reportSubadmin(Request $request)
    {
        $validate = $request->validate([
            "from_date"   => "required|date_format:Y-m-d",
            "to_date"     => "required|date_format:Y-m-d|after:from_date",
        ], [
            "from_date.required"      => "From Date  is Required",
            "from_date.date_format"   => "From Date Format is Invalid",
            "to_date.required"        => "End Date is Required",
            "to_date.date_format"     => "End Date  Format is Invalid",
            "to_date.after"           => "End Date  must be after From Date",
        ]);

        return (new SubdminClientExport($request->from_date, $request->to_date))->download('outpass_report.xlsx');
    }
}
