<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use App\Models\User;
use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $data = Outpass::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $lastApprovetOutpass = $data->where('status', 1)->pluck('outpass_id')->first();
        $lastRejectedOutpass = $data->where('status', 2)->pluck('outpass_id')->first();
        $lastPendingOutpass = $data->where('status', 0)->pluck('outpass_id')->first();
        $totalOutpass = $data->count();
        $totalApprovetOutpass = $data->where('status', 1)->count();
        $totalRejectedOutpass = $data->where('status', 2)->count();
        $totalPendingOutpass = $data->where('status', 0)->count();
        return view('client.dashboard', compact('totalOutpass', 'totalApprovetOutpass', 'totalRejectedOutpass', 'totalPendingOutpass', 'lastPendingOutpass', 'lastApprovetOutpass', 'lastRejectedOutpass', 'data'));
    }

    public function createOutpass()
    {
        return view('client.create-outpass');
    }

    public function storeOutpass(Request $request)
    {
        $validate = $request->validate([
            'destination'       => 'required',
            "outpass_type"      => "required|in:0,1,2",
            "start_date_time"   => "required|date_format:Y-m-d H:i:s|after:" . Carbon::now()->format('Y-m-d H:i:s'),
            "end_date_time"     => "required|date_format:Y-m-d H:i:s|after:start_date_time",
            "purpose"           => "required"
        ], [
            "destination.required"          => "Destination is Required",
            "outpass_type.required"         => "Please Select Outpass Type",
            "outpass_type.in"               => "Please Select Valid Outpass Type",
            "start_date_time.required"      => "Start Date Time is Required",
            "start_date_time.date_format"   => "Start Date Time Format is Invalid",
            "end_date_time.required"        => "End Date Time is Required",
            "end_date_time.date_format"     => "Start Date Time Format is Invalid",
            "end_date_time.after"           => "End Date Time must be after Start Date Time",
            "purpose.required"              => "Outpass Purpose is Required"
        ]);

        $outpass_id = $this->generateRandomOutpassId();
        $start_date_time = $request->start_date_time;
        $end_date_time = $request->end_date_time;

        // $overlappingRecords = Outpass::where('user_id', Auth::user()->id)
        //     ->where(function ($query) use ($start_date_time, $end_date_time) {
        //         $query->where(function ($q) use ($start_date_time, $end_date_time) {
        //             $q->where('start_date_time', '<', $end_date_time)
        //                 ->where('end_date_time', '>', $start_date_time);
        //         })->orWhere(function ($q) use ($start_date_time, $end_date_time) {
        //             $q->where('start_date_time', '>', $start_date_time)
        //                 ->where('start_date_time', '<', $end_date_time);
        //         });
        //     })
        //     ->get();
        $overlappingRecords = Outpass::where('user_id', Auth::user()->id)
            ->where(function ($query) use ($start_date_time, $end_date_time) {
                $query->where(function ($q) use ($start_date_time, $end_date_time) {
                    $q->whereBetween('start_date_time', [$start_date_time, $end_date_time])
                        ->orWhereBetween('end_date_time', [$start_date_time, $end_date_time]);
                })->orWhere(function ($q) use ($start_date_time, $end_date_time) {
                    $q->where('start_date_time', '<', $start_date_time)
                        ->where('end_date_time', '>', $end_date_time);
                });
            })
            ->first();

        if ($overlappingRecords) {
            toastr()->addError('Overlapping records found');
            return redirect()->back();
        } else {
            Outpass::create([
                'user_id'           => Auth::user()->id,
                'hostel_id'         => Auth::user()->userDetails->hostel_id,
                'hostel_floor_id'   => Auth::user()->userDetails->hostel_floor_id,
                'destination'       => $request->destination,
                'outpass_id'        => $outpass_id,
                'outpass_type'      => $request->outpass_type,
                'purpose'           => $request->purpose,
                'start_date_time'   => $start_date_time,
                'end_date_time'     => $end_date_time,
                'parent_permission' => $request->parent_permission,
            ]);

            toastr()->addSuccess('Created! Please wait for Approval.');
            return redirect()->route('dashboard');
        }
    }


    public function additonalInfo()
    {
        if (Auth::user()->userDetails->additional_status  == 0) {
            $hostelShortCode = Auth::user()->userDetails->hostel->short_code;
            $floors = Auth::user()->userDetails->hostel->floors;
            return view('client.additonal-info', compact('hostelShortCode', 'floors'));
        }
        return redirect()->back();
    }

    public function additonalInfoSave(Request $request)
    {
        if (Auth::user()->userDetails->additional_status  == 0) {
            $floorIds = Auth::user()->userDetails->hostel->floors->pluck('id')->implode(',');
            $validate = $request->validate([
                'roll_no'           => 'required',
                'phone_no'          => 'required',
                'guardian_name'     => 'required',
                'guardian_phone_no' => 'required',
                'address'           => 'required',
                'course'            => 'required',
                'year'              => 'required|in:1,2,3,4',
                'room_number'       => 'required',
                'hostel_floor_id'   => 'required|in:' . $floorIds,

            ], [
                'roll_no.required'           => 'Roll No. is required',
                'phone_no.required'          => 'Phone No. is required',
                'guardian_name.required'     => 'Guardian Name is required',
                'guardian_phone_no.required' => 'Guardian Phone No. is required',
                'address.required'           => 'Address is required',
                'course.required'            => 'Course is required',
                'year.required'              => 'Year is required',
                'year.in'                    => 'Provide Valid Year',
                'room_number.required'       => 'Room No. is required',
                'hostel_floor_id.required'   => 'Hostel Floor is required',
                'hostel_floor_id.in'         => 'Provide Valid Floor',
            ]);

            $userDetails = UserDetails::where('user_id', Auth::user()->id)->first();
            $userDetails->roll_no = $request->roll_no;
            $userDetails->phone_no = $request->phone_no;
            $userDetails->guardian_name = $request->guardian_name;
            $userDetails->guardian_phone_no = $request->guardian_phone_no;
            $userDetails->address = $request->address;
            $userDetails->course = $request->course;
            $userDetails->year = $request->year;
            $userDetails->room_number = $request->room_number;
            $userDetails->hostel_floor_id = $request->hostel_floor_id;
            $userDetails->additional_status = 1;
            $userDetails->save();

            toastr()->addSuccess('Added Successfully!');
            return redirect()->route('dashboard');
        }
    }

    public function clientNotification()
    {
        $notifications = Outpass::where('user_id', auth()->user()->id)->whereIn('status', [1, 2])->where('notification_status', '!=', 2)->get();

        $listNotification = "";
        foreach ($notifications as $notification) {
            if ($notification->status == 1) {
                $status = '<b class="text-success">Approved</b>';
            } else {
                $status = '<b class="text-danger">Rejected</b>';
            }
            $listNotification .= '<div class="media new clearNotifi" data-id="' . $notification->id . '"><div class="media-body"><p>Dear <strong>' . auth()->user()->name . '</strong> your <strong>' . $notification->outpass_id . '</strong> outpass has been ' . $status . '</p></div></div>';
        }
        return response()->json([
            'status'                => true,
            'total_notification'    => $notifications->count(),
            'list_notification'     => $listNotification
        ]);
    }

    public function clientNotificationClear(Request $request)
    {
        Outpass::where('id', $request->outpass_id)->update(['notification_status' => 2]);
        return response()->json([
            'status' => true,
        ]);
    }

    public function generateRandomOutpassId()
    {
        $outpassId = Auth::user()->userDetails->hostel->short_code . mt_rand(1000, 9999);

        if (Outpass::where('outpass_id', $outpassId)->exists()) {
            $this->generateRandomOutpassId();
        } else {
            return $outpassId;
        }
    }

    public function changePassword()
    {
        return view('client.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            toastr()->addError('Old Password is Invalid');
            return redirect()->back();
        }
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->addSuccess('Password Updated Successfully');
        return redirect()->route('dashboard');
    }
}
