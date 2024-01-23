@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Take Action on Pass</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('incharge-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Take Action on Pass</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h6 class="main-content-label">Take Action on Pass</h6>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fe fe-info me-2"></i>
                            <div>
                                Your decision is monitored by Higher Authorities, So approve student request carefully.
                            </div>
                        </div>
                        <form action="{{ route('approveoutpass', $outpass->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="tx-semibold">Approve or Reject Pass <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100" name="status" id="status" required>
                                        <option value="">Choose Option</option>
                                        <option value="1">Approve</option>
                                        <option value="2">Reject</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sureStatus" class="tx-semibold">Are you sure? <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" name="sure_status" id="sureStatus" required>
                                        <option value="">Choose...</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('sure_status')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="parentTalk" class="tx-semibold">Did you talk Student Parent? if yes then define</label>
                                    <input type="text" class="form-control" id="parentTalk" name="parent_talk" placeholder="Write down here" value="{{ old('parent_talk') }}">
                                    <div class="invalid-feedback">Valid first name is required.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="approvalReason" class="tx-semibold">Why are you giving approval?</label>
                                    <input type="text" class="form-control" id="approvalReason" placeholder="Why are you giving approval" name="approval_reason" value="{{ old('approval_reason') }}">
                                    <div class="invalid-feedback">Valid last name is required.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="teachingDay" class="tx-semibold">it's Teaching or Non-Teaching Day?</label>
                                    <input type="text" class="form-control" id="teachingDay" placeholder="write down here" name="teaching_day" value="{{ old('teaching_day') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="addtionInfo" class="tx-semibold">Write Timing manually, or Additioanl information?</label>
                                    <input type="text" class="form-control" id="addtionInfo" placeholder="is pass approved on college timing?" name="additional_info" value="{{ old('additional_info') }}">
                                </div>
                                <div class="text-wrap">
                                    <div class="btn-list">
                                        <button type="submit" class="btn ripple btn-secondary-transparent btn-block btn-md">Submit</button>
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