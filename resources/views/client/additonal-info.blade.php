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
                                    <label for="firstName" class="tx-semibold">Roll No.</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Roll No." value="" required="">
                                    <div class="invalid-feedback">Valid first name is required.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="tx-semibold">Phone No.</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Phone No." value="" required="">
                                    <div class="invalid-feedback">Valid last name is required.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="tx-semibold">Guardian Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Guardian Name" value="" required="">
                                    <div class="invalid-feedback">Valid first name is required.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="tx-semibold">Guardian Mobile No</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Guardian Mobile No" value="" required="">
                                    <div class="invalid-feedback">Valid last name is required.</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="tx-semibold">Complete Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Complete Address" required="">
                                <div class="invalid-feedback">Please enter your shipping address.</div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country" class="tx-semibold">Course</label>
                                    <select class="form-select d-block w-100 select2" id="country" required="">
                                        <option value="">Choose...</option>
                                        <option>BCA</option>
                                        <option>MCA</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid country.</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state" class="tx-semibold">Select Year</label>
                                    <select class="form-select d-block w-100 select2" id="state" required="">
                                        <option value="">Choose...</option>
                                        <option>1st Year</option>
                                        <option>2nd Year</option>
                                        <option>3rd Year</option>
                                        <option>4th Year</option>
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid state.</div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip" class="tx-semibold">Room Number</label>
                                    <input type="text" class="form-control" id="zip" placeholder="Room Number" required="">
                                    <div class="invalid-feedback">Zip code required.</div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="floor" class="tx-semibold">Select Floor</label>
                                    <select class="form-select d-block w-100 select2" id="floor" name="hostel_floor_id" required="">
                                        <option value="">Choose Floor</option>
                                        @foreach($floors as $floor)
                                        <option value="{{ $floor->id }}">{{ $floor->floor_name }}</option>
                                        @endforeach
                                    </select>
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