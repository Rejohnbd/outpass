@extends('layouts.app')

@section('title', 'Update Profile')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Update Profile</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <button type="button" class="btn btn-white btn-icon-text my-2 me-2">
                        <i class="fe fe-settings"></i>
                        <span>Hostel: {{ Auth::user()->userDetails->hostel->short_code }}</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h6 class="main-content-label">Additional Information</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-profile') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rollNo" class="tx-semibold">Roll No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="rollNo" placeholder="Roll No." name="roll_no" value="{{ old('roll_no', $userDetails->roll_no) }}" required>
                                    @error('roll_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phoneNo" class="tx-semibold">Phone No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phoneNo" name="phone_no" placeholder="Phone No." value="{{ old('phone_no', $userDetails->phone_no ) }}" required>
                                    @error('phone_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gardianName" class="tx-semibold">Guardian Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="gardianName" name="guardian_name" placeholder="Guardian Name" value="{{ old('guardian_name', $userDetails->guardian_name) }}" required>
                                    @error('guardian_name')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gardianPhoneNo" class="tx-semibold">Guardian Mobile No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="gardianPhoneNo" placeholder="Guardian Mobile No" name="guardian_phone_no" value="{{ old('guardian_phone_no', $userDetails->guardian_phone_no) }}" required>
                                    @error('guardian_phone_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="tx-semibold">Complete Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Complete Address" required value="{{ old('address', $userDetails->address) }}">
                                @error('address')
                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="slectCourse" class="tx-semibold">Course <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" id="slectCourse" name="course_id" required>
                                        <option value="">Choose Course</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id', $userDetails->course_id) == $course->id ? 'selected' : ''}}>{{ $course->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('course_id')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="selectYear" class="tx-semibold">Select Year <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100" id="selectYear" name="year" required>
                                        <option value="">Choose Year</option>
                                        <option value="1" {{ old('year', $userDetails->year) == '1' ? 'selected' : ''}}>1st Year</option>
                                        <option value="2" {{ old('year', $userDetails->year) == '2' ? 'selected' : ''}}>2nd Year</option>
                                        <option value="3" {{ old('year', $userDetails->year) == '3' ? 'selected' : ''}}>3rd Year</option>
                                        <option value="4" {{ old('year', $userDetails->year) == '4' ? 'selected' : ''}}>4th Year</option>
                                    </select>
                                    @error('year')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="roomNumber" class="tx-semibold">Room Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="roomNumber" placeholder="Room Number" name="room_number" required value="{{ old('room_number', $userDetails->room_number) }}">
                                    @error('room_number')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="floor" class="tx-semibold">Select Floor <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" id="floor" name="hostel_floor_id" required>
                                        <option value="">Choose Floor</option>
                                        @foreach($floors as $floor)
                                        <option value="{{ $floor->id }}" {{ old('hostel_floor_id', $userDetails->hostel_floor_id) == $floor->id ? 'selected' : ''}}>{{ $floor->floor_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('hostel_floor_id')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-wrap">
                                    <div class="btn-list">
                                        <button type="submit" class="btn ripple btn-secondary-transparent btn-block btn-md">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection