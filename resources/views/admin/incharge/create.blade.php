@extends('layouts.app')

@section('title', isset($user) ? 'Update Incharge' : 'Create Incharge')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ isset($user) ? 'Update Incharge' : 'Create Incharge' }} </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($user) ? 'Update Incharge' : 'Create Incharge' }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h6 class="main-content-label">{{ isset($user) ? 'Update' : 'Create' }} Incharge</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($user) ? route('incharges.update', $user->id) : route('incharges.store') }}" method="post">
                            @csrf
                            @if(isset($user))
                            @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="tx-semibold">Incharge Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="Incharge Name" name="name" value="{{ old('name', isset($user) ? $user->name : null) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="tx-semibold">Incharge Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="Purpose" name="email" @if(isset($user)) readonly @endif value="{{ old('email', isset($user) ? $user->email : null) }}" required>
                                    @error('email')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="hostelType" class="tx-semibold">Select Hostel <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" name="hostel_id" id="hostelType" required>
                                        <option value="">Choose...</option>
                                        @foreach($hostels as $hostel)
                                        <option value="{{ $hostel->id }}" {{ old('hostel_id', isset($user) ? $user->incharge->hostel_id : null) == $hostel->id ? 'selected' : '' }}>{{ $hostel->name }} ({{$hostel->short_code}})</option>
                                        @endforeach
                                    </select>
                                    @error('hostel_id')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="floorType" class="tx-semibold">Select Floor<span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" id="floorType" name="hostel_floor_id" reqyuired>
                                        <option value="">Choose...</option>
                                    </select>
                                    @error('hostel_floor_id')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="tx-semibold">Password @if(!isset($user)) <span class="text-danger">*</span> @endif</label>
                                    <input type="text" id="password" class="form-control" placeholder="Password" name="password" {{!isset($user) ? 'required' : ''}}>
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmPassword" class="tx-semibold">Confirm Password @if(!isset($user)) <span class="text-danger">*</span> @endif</label>
                                    <input type="text" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="password_confirmation" {{!isset($user) ? 'required' : ''}}>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-wrap">
                                <div class="btn-list">
                                    <button type="submit" class="btn ripple btn-secondary-transparent btn-block btn-md">{{ isset($user) ? 'Update' : 'Create' }} Incharge</button>
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
@if(isset($user))
<script>
    $(document).ready(function() {
        let hostelId = "{{ $user->incharge->hostel_id }}";
        let floorId = "{{ $user->incharge->hostel_floor_id }}";
        console
        $.ajax({
            type: "post",
            url: "{{ route('get-floors') }}",
            data: {
                'hostel_id': hostelId,
                '_token': "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                $.each(response.hostelFloors, function(key, value) {
                    if (value.id == floorId) {
                        $("#floorType").append('<option value=' + value.id + ' selected>' + value.floor_name + '</option>');
                    } else {
                        $("#floorType").append('<option value=' + value.id + '>' + value.floor_name + '</option>');
                    }
                })
            }
        });
    });
</script>
@endif
<script>
    $(document).ready(function() {
        $('#hostelType').on('change', function() {
            let hostelId = $(this).val();
            if (hostelId != '') {
                $('#floorType').empty();
                $.ajax({
                    type: "post",
                    url: "{{ route('get-floors') }}",
                    data: {
                        'hostel_id': hostelId,
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        $.each(response.hostelFloors, function(key, value) {
                            $("#floorType").append('<option value=' + value.id + '>' + value.floor_name + '</option>');
                        })
                    }
                });
            } else {
                $('#floorType').empty();
                $("#floorType").append('<option value="">Choose...</option>');
            }
        })
    })
</script>
@endpush