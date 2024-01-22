<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use App\Models\UserDetails;
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
