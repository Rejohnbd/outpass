@extends('layouts.app')

@section('title', 'Request Pass')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Request Pass</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Request Pass</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h6 class="main-content-label">Request Pass</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('request-pass') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="destination" class="tx-semibold">Destination <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="destination" placeholder="Destination" name="destination" value="{{ old('destination') }}" required>
                                    @error('destination')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="purpose" class="tx-semibold">Purpose <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="purpose" placeholder="Purpose" name="purpose" value="{{ old('purpose') }}" required>
                                    @error('purpose')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="startDateTimePicker" class="tx-semibold">From <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="startDateTimePicker" placeholder="fromDate" name="start_date_time" value="{{ old('start_date_time') }}" required>
                                    @error('start_date_time')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="endDateTimePicker" class="tx-semibold">To <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="endDateTimePicker" placeholder="To" name="end_date_time" value="{{ old('end_date_time') }}" required>
                                    @error('end_date_time')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="outPassType" class="tx-semibold">Outpass Type <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" name="outpass_type" id="outPassType">
                                        <option value="">Choose...</option>
                                        <option value="0">Outpass</option>
                                        <option value="1">Homepass</option>
                                        <option value="2">Emergency</option>
                                    </select>
                                    @error('outpass_type')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="parentPermission" class="tx-semibold">Parent Permission <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" id="parentPermission" name="parent_permission">
                                        <option value="">Choose...</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('parent_permission')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-wrap">
                                <div class="btn-list">
                                    <button type="submit" class="btn ripple btn-secondary-transparent btn-block btn-md">Submit Request Pass</button>
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

@push('scripts')
<script src="{{ asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {
        let currentDateTime = new Date();
        $('#startDateTimePicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            startDate: currentDateTime,
            autoclose: true
        });

        $('#endDateTimePicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            startDate: currentDateTime,
            autoclose: true
        });
    })
</script>
@endpush