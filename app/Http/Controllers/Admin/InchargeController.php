<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Models\HostelFloor;
use App\Models\Incharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class InchargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('incharge')->where('user_type', 'incharge')->paginate(10);
        return view('admin.incharge.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hostels = Hostel::all();
        return view('admin.incharge.create', compact('hostels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'hostel_id' => ['required', 'exists:hostels,id'],
        ]);

        $user = User::create([
            'user_type' => 'incharge',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Incharge::create([
            'user_id'       => $user->id,
            'hostel_id'     => $request->hostel_id,
            'hostel_floor_id' => $request->hostel_floor_id
        ]);

        toastr()->addSuccess('Created Successfully');
        return redirect()->route('incharges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('incharge')->where('id', $id)->first();
        if ($user) {
            $hostels = Hostel::all();
            return view('admin.incharge.create', compact('user', 'hostels'));
        } else {
            toastr()->addError('Incharge Not Found');
            return redirect()->route('incharges.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'hostel_id' => ['required', 'exists:hostels,id'],
        ]);

        $user = User::with('incharge')->where('id', $id)->first();
        if ($user) {
            $user->name = $request->name;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $user->incharge()->update([
                'hostel_id' => $request->hostel_id,
                'hostel_floor_id' => $request->hostel_floor_id
            ]);

            toastr()->addSuccess('Updated Successfully');
            return redirect()->route('incharges.index');
        } else {
            toastr()->addError('Incharge Not Found');
            return redirect()->route('incharges.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::with('incharge')->where('id', $id)->first();
        if ($user) {
            $user->incharge()->delete();
            $user->delete();
            toastr()->addSuccess('Deleted Successfully');
            return redirect()->route('incharges.index');
        } else {
            toastr()->addError('Incharge Not Found');
            return redirect()->route('incharges.index');
        }
    }

    public function getFloors(Request $request)
    {
        $hostlFloors = HostelFloor::where('hostel_id', $request->hostel_id)->get();
        return response()->json([
            'status' => 200,
            'hostelFloors' => $hostlFloors
        ]);
    }
}
