<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientOutpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Outpass::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('client.outpass.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.outpass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "outpass_type"      => "required|in:0,1",
            "start_date_time"   => "required|date_format:Y-m-d H:i:s",
            "end_date_time"     => "required|date_format:Y-m-d H:i:s|after:start_date_time",
            "purpose"           => "required"
        ], [
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
            $value = ((int) str_replace("OBH", "", $checkOutpassInfo->outpass_id)) + 1;
            $outpass_id = 'OBH1' . $value;
        } else {
            $outpass_id = 'OBH1000';
        }
        Outpass::create([
            'user_id'           => Auth::user()->id,
            'outpass_id'        => $outpass_id,
            'outpass_type'      => $request->outpass_type,
            'purpose'           => $request->purpose,
            'start_date_time'   => $request->start_date_time,
            'end_date_time'     => $request->end_date_time,
            'parent_permission' => $request->parent_permission == 'on' ? 1 : 0,
        ]);

        toastr()->addSuccess('Created! Please wait for Approval.');
        return redirect()->route('outpass.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Outpass $outpass)
    {
        if ($outpass->status == 0 && Auth::user()->id == $outpass->user_id) {
            return view('client.outpass.create', compact('outpass'));
        } else {
            toastr()->addWarning("Waring! Don't have permission.");
            return redirect()->route('outpass.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outpass $outpass)
    {
        if ($outpass->status == 0 && Auth::user()->id == $outpass->user_id) {
            $validate = $request->validate([
                "outpass_type"      => "required|in:0,1",
                "start_date_time"   => "required",
                "end_date_time"     => "required",
                "purpose"           => "required"
            ], [
                "outpass_type.required"     => "Please Select Outpass Type",
                "outpass_type.in"           => "Please Select Valid Outpass Type",
                "start_date_time.required"  => "Start Date Time is Required",
                "end_date_time.required"    => "End Date Time is Required",
                "purpose.required"          => "Outpass Purpose is Required"
            ]);
            $outpass->update([
                'outpass_type'      => $request->outpass_type,
                'purpose'           => $request->purpose,
                'start_date_time'   => $request->start_date_time,
                'end_date_time'     => $request->end_date_time,
                'parent_permission' => $request->parent_permission == 'on' ? 1 : 0,
            ]);

            toastr()->addSuccess('Updated! Please wait for Approval.');
            return redirect()->route('outpass.index');
        } else {
            toastr()->addWarning("Waring! Don't have permission.");
            return redirect()->route('outpass.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outpass $outpass)
    {
        if ($outpass->status == 0 && Auth::user()->id == $outpass->user_id) {
            $outpass->delete();
            toastr()->addSuccess('Delete Successfully.');
            return redirect()->route('outpass.index');
        } else {
            toastr()->addWarning("Waring! Don't have permission.");
            return redirect()->route('outpass.index');
        }
    }
}
