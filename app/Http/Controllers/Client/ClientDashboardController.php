<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientDashboardController extends Controller
{
    public function index()
    {
        // $todayData = Outpass::where('user_id', Auth::user()->id)->whereDate('created_at', '=', date('Y-m-d'))->get();
        // $todayPendingOutpass = $todayData->where('status', 0)->count();
        // $todayAcceptedOutpass = $todayData->where('status', 1)->count();
        // $todayRejectedOutpass = $todayData->where('status', 2)->count();

        $data = Outpass::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        $lastApprovetOutpass = $data->where('status', 1)->pluck('outpass_id')->first();
        $lastRejectedOutpass = $data->where('status', 2)->pluck('outpass_id')->first();
        $lastPendingOutpass = $data->where('status', 0)->pluck('outpass_id')->first();
        // dd($lastPendingOutpass);
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

        $checkOutpassInfo = Outpass::orderBy('id', 'desc')->first('outpass_id');

        if ($checkOutpassInfo) {
            $value = ((int) str_replace(Auth::user()->userDetails->hostel->short_code, "", $checkOutpassInfo->outpass_id)) + 1;
            $outpass_id = Auth::user()->userDetails->hostel->short_code . $value;
        } else {
            $shortCode = Auth::user()->userDetails->hostel->short_code;
            $outpass_id = $shortCode . '1000';

            // dd($outpass_id);
        }

        // dd($request->all());

        $start_date_time = $request->start_date_time;
        $end_date_time = $request->end_date_time;

        $overlappingRecords = Outpass::where('user_id', Auth::user()->id)
            ->where(function ($query) use ($start_date_time, $end_date_time) {
                $query->where(function ($q) use ($start_date_time, $end_date_time) {
                    $q->where('start_date_time', '<', $end_date_time)
                        ->where('end_date_time', '>', $start_date_time);
                })->orWhere(function ($q) use ($start_date_time, $end_date_time) {
                    $q->where('start_date_time', '>', $start_date_time)
                        ->where('start_date_time', '<', $end_date_time);
                });
            })
            ->get();

        if ($overlappingRecords->isNotEmpty()) {
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
}
