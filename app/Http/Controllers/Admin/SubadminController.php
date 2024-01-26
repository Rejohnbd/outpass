<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Models\Subadmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('user_type', 'subadmin')->paginate(10);
        return view('admin.subadmin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hostels = Hostel::all();
        return view('admin.subadmin.create', compact('hostels'));
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
            'user_type' => 'subadmin',
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        Subadmin::create([
            'user_id'       => $user->id,
            'hostel_id'     => $request->hostel_id,
        ]);

        toastr()->addSuccess('Created Successfully');
        return redirect()->route('subadmins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Subadmin $subadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('subadmin')->where('id', $id)->first();
        if ($user) {
            $hostels = Hostel::all();
            return view('admin.subadmin.create', compact('user', 'hostels'));
        } else {
            toastr()->addError('Subadmin Not Found');
            return redirect()->route('subadmins.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'hostel_id' => ['required', 'exists:hostels,id'],
        ]);

        $user = User::with('subadmin')->where('id', $id)->first();
        if ($user) {
            $user->name = $request->name;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $user->incharge()->update([
                'hostel_id' => $request->hostel_id,
            ]);

            toastr()->addSuccess('Updated Successfully');
            return redirect()->route('subadmins.index');
        } else {
            toastr()->addError('Usadmin Not Found');
            return redirect()->route('subadmins.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::with('subadmin')->where('id', $id)->first();
        if ($user) {
            $user->subadmin()->delete();
            $user->delete();
            toastr()->addSuccess('Deleted Successfully');
            return redirect()->route('subadmins.index');
        } else {
            toastr()->addError('Subadmin Not Found');
            return redirect()->route('subadmins.index');
        }
    }
}
