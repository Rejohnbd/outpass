@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Change Password</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h6 class="main-content-label">Change Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-password') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="old_password" class="tx-semibold">Old Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="old_password" placeholder="Old Password" name="old_password" required>
                                    @error('old_password')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password" class="tx-semibold">New Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" placeholder="New Password" name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password_confirmation" class="tx-semibold">Confirm New Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password_confirmation" placeholder="New Password" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-wrap">
                                <div class="btn-list">
                                    <button type="submit" class="btn ripple btn-secondary-transparent btn-block btn-md">Update Password</button>
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