<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outpass;
use Illuminate\Http\Request;

class AdminOutpassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Outpass::orderBy('id', 'desc')->paginate(10);
        return view('admin.outpass.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function outPassApproval(Request $request, $id)
    {
        $outpass = Outpass::where('id', $id)->where('status', 0)->first();
        if ($outpass) {
            $outpass->status = 1;
            $outpass->approval_date_time = now();
            $outpass->notification_status = 1;
            $outpass->save();
            toastr()->addSuccess('Approved Successfully!');
            return redirect()->route('out-pass.index');
        } else {
            toastr()->addError('Something went wrong!');
            return redirect()->route('out-pass.index');
        }
    }

    public function outPassReject(Request $request, $id)
    {
        $outpass = Outpass::where('id', $id)->where('status', 0)->first();
        if ($outpass) {
            $outpass->status = 2;
            $outpass->approval_date_time = now();
            $outpass->notification_status = 1;
            $outpass->save();
            toastr()->addSuccess('Rejected Successfully!');
            return redirect()->route('out-pass.index');
        } else {
            toastr()->addError('Something went wrong!');
            return redirect()->route('out-pass.index');
        }
    }
}
