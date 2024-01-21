@extends('layouts.app')

@section('title', 'Additional Info')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Additional Information</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;">Submit Additional Information</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Additional Information</li>
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
                        <form class="needs-validation" novalidate="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rollNo" class="tx-semibold">Roll No.</label>
                                    <input type="text" class="form-control" id="rollNo" placeholder="Roll No." name="roll_no" value="" required>
                                    @error('roll_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phoneNo" class="tx-semibold">Phone No.</label>
                                    <input type="text" class="form-control" id="phoneNo" name="phone_no" placeholder="Phone No." value="" required>
                                    @error('phone_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gardianName" class="tx-semibold">Guardian Name</label>
                                    <input type="text" class="form-control" id="gardianName" name="guardian_name" placeholder="Guardian Name" value="" required>
                                    @error('guardian_name')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gardianPhoneNo" class="tx-semibold">Guardian Mobile No</label>
                                    <input type="text" class="form-control" id="gardianPhoneNo" placeholder="Guardian Mobile No" name="guardian_phone_no" value="" required>
                                    @error('guardian_phone_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="tx-semibold">Complete Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Complete Address" required>
                                @error('course')
                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="slectCourse" class="tx-semibold">Course <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" id="slectCourse" name="course" required="">
                                        <option value="">Choose Course</option>
                                        <option>BCA</option>
                                        <option>MCA</option>
                                    </select>
                                    @error('course')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="selectYear" class="tx-semibold">Select Year <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100" id="selectYear" name="year" required>
                                        <option value="">Choose Year</option>
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                    </select>
                                    @error('year')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="roomNumber" class="tx-semibold">Room Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="roomNumber" placeholder="Room Number" name="roll_no" required>
                                    @error('roll_no')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="floor" class="tx-semibold">Select Floor <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" id="floor" name="hostel_floor_id" required>
                                        <option value="">Choose Floor</option>
                                        @foreach($floors as $floor)
                                        <option value="{{ $floor->id }}">{{ $floor->floor_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('hostel_floor_id')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-wrap">
                                    <div class="btn-list">
                                        <button type="button" class="btn ripple btn-secondary-transparent btn-block btn-md">Submit Additional Information</button>
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