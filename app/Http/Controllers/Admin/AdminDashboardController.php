<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AdminClientExport;
use App\Serialisers\AdminOutpassSerialiser;
use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Models\Outpass;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exporter;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Excel;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = Outpass::orderBy('id', 'desc')->get();

        $lastApprovetOutpass = $data->where('status', 1)->pluck('outpass_id')->first();
        $lastRejectedOutpass = $data->where('status', 2)->pluck('outpass_id')->first();
        $lastPendingOutpass = $data->where('status', 0)->pluck('outpass_id')->first();
        $totalOutpass = $data->count();
        $totalAcceptedOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        $totalPendingOutpass = $data->where('status', 0)->count();

        $allOutpass = $data;

        return view('admin.dashboard', compact('lastApprovetOutpass', 'lastRejectedOutpass', 'lastPendingOutpass', 'totalOutpass', 'totalAcceptedOutpass', 'totalRejectedOutpass', 'totalPendingOutpass', 'allOutpass'));
    }

    public function approvalOutpass($id)
    {

        $outpass = Outpass::where('outpass_id', $id)->where('status', 0)->first();
        if ($outpass) {
            return view('admin.approval-outpass', compact('outpass'));
        } else {
            toastr()->addError('Outpass Status Changes Already');
            return redirect()->route('admin-dashboard');
        }
    }

    public function outpassApproval(Request $request, $id)
    {
        $outpass = Outpass::where('id', $id)->where('status', 0)->first();
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
            return redirect()->route('admin-dashboard');
        } else {
            toastr()->addError('Outpass Status Changes Already');
            return redirect()->route('admin-dashboard');
        }
    }

    public function AdminNotification()
    {
        $notifications = Outpass::where('status', 0)->whereDate('created_at', '=', date('Y-m-d'))->get();
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

    public function clientList()
    {
        $userList = User::whereHas('userDetails', function ($query) {
            $query->where('additional_status', '2');
        })->where('user_type', 'client')->withCount([
            'outpass as total_count',
            'outpass as pending' => function ($query) {
                $query->where('status', 0);
            },
            'outpass as approved' => function ($query) {
                $query->where('status', 1);
            },
            'outpass as rejected' => function ($query) {
                $query->where('status', 2);
            },
        ])->orderBy('id', 'desc')->get();

        $hostelList = Hostel::withCount([
            'outpass as total_count',
            'outpass as pending' => function ($query) {
                $query->where('status', 0);
            },
            'outpass as approved' => function ($query) {
                $query->where('status', 1);
            },
            'outpass as rejected' => function ($query) {
                $query->where('status', 2);
            },
        ])->get();

        return view('admin.client-list', compact('userList', 'hostelList'));
    }

    public function newClientList()
    {
        $userList = User::whereHas('userDetails', function ($query) {
            $query->where('additional_status', '1');
        })->get();

        return view('admin.client-list-new', compact('userList'));
    }

    public function clientApprove(Request $request)
    {
        $userDetails = UserDetails::where('user_id', $request->id)->where('additional_status', 1)->first();
        if ($userDetails) {
            $userDetails->additional_status = 2;
            $userDetails->save();
            toastr()->addSuccess('Approved Successfully');
            return redirect()->route('new-client-list');
        } else {
            toastr()->addError('Something Happend Wrog. Try Again');
            return redirect()->route('new-client-list');
        }
    }


    public function deleteOutpass($id)
    {
        $outpass = Outpass::where('status', '!=', 0)->first();
        if ($outpass) {
            $outpass->delete();
            toastr()->addSuccess('Deleted Successfully');
            return redirect()->route('admin-dashboard');
        } else {
            toastr()->addError('Something Happend Wrog. Try Again');
            return redirect()->route('admin-dashboard');
        }
    }

    public function reportAdmin(Request $request)
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

        return (new AdminClientExport($request->from_date, $request->to_date))->download('outpass_report.xlsx');
    }
}
