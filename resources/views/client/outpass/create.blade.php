@extends('layouts.app')

@section('title', isset($outpass) ? 'Edit Outpass' : 'Create Outpass' )

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Outpass</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('outpass.index') }}">All Outpass</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($outpass) ? 'Edit Outpass' : 'Create Outpass' }}</li>
                </ol>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card custom-card">
                    <form action="{{ isset($outpass) ? route('outpass.update', $outpass->id) : route('outpass.store') }}" method="post">
                        @csrf
                        @if(isset($outpass))
                        @method('PUT')
                        @endif
                        <div class="card-body">
                            <div>
                                <h6 class="main-content-label mb-1">{{ isset($outpass) ? 'Edit Outpass' : 'Create Outpass' }}</h6>
                            </div>
                            <div class="row row-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="mg-b-10 tx-semibold">Outpass Type <span class="text-danger">*</span></p>
                                        <select name="outpass_type" class="form-control" required>
                                            <option value="">Choose One</option>
                                            <option value="0" {{ old('outpass_type', isset($outpass) ? $outpass->outpass_type : '') == 0 ? 'selected' : ''}}>Outpass</option>
                                            <option value="1" {{ old('outpass_type', isset($outpass) ? $outpass->outpass_type : '') == 1 ? 'selected' : ''}}>Homepass</option>
                                        </select>
                                        @error('outpass_type')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <p class="mg-b-10 tx-semibold">Start Date Time <span class="text-danger">*</span></p>
                                        <input class="form-control" id="startDateTimePicker" placeholder="Enter Start Date Time" type="text" name="start_date_time" value="@if(isset($outpass)) {{ $outpass->start_date_time  }}@endif" required>
                                        @error('start_date_time')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="mg-b-14 tx-semibold">Parent Permission <span class="text-danger">*</span></p>
                                        <label class="custom-switch">
                                            <input type="checkbox" name="parent_permission" class="custom-switch-input" {{ old('parent_permission', isset($outpass) ? $outpass->parent_permission :'') == '1' ? 'checked' : ''}}>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">I Have Parent Permission</span>
                                        </label>
                                    </div>
                                    <div class="form-group ">
                                        <p class="mg-b-11 tx-semibold">End Date Time <span class="text-danger">*</span></p>
                                        <input class="form-control" id="endDateTimePicker" placeholder="Enter End Date Time" type="text" name="end_date_time" value="@if(isset($outpass)) {{ $outpass->end_date_time  }}@endif" required>
                                        @error('end_date_time')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group mb-0">
                                        <p class="mg-b-10 tx-semibold">Outpass Purpose <span class="text-danger">*</span></p>
                                        <textarea class="form-control" rows="4" placeholder="Write here.." name="purpose" required>{{ old('purpose', isset($outpass) ? $outpass->purpose : "") }} </textarea>
                                        @error('purpose')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn ripple btn-primary">Submit</button>
                            <a href="{{ route('outpass.index') }}" class="btn ripple btn-outline-danger w-md">Cancel</a>
                        </div>
                    </form>
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