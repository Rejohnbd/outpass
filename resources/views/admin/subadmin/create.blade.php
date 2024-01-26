@extends('layouts.app')

@section('title', isset($user) ? 'Update Subadmin' : 'Create Subadmin')

@section('content')
<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ isset($user) ? 'Update Subadmin' : 'Create Subadmin' }} </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($user) ? 'Update Subadmin' : 'Create Subadmin' }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h6 class="main-content-label">{{ isset($user) ? 'Update' : 'Create' }} Subadmin</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($user) ? route('subadmins.update', $user->id) : route('subadmins.store') }}" method="post">
                            @csrf
                            @if(isset($user))
                            @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="tx-semibold">Subadmin Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="Subadmin Name" name="name" value="{{ old('name', isset($user) ? $user->name : null) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="tx-semibold">Subadmin Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="Purpose" name="email" @if(isset($user)) readonly @endif value="{{ old('email', isset($user) ? $user->email : null) }}" required>
                                    @error('email')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="hostelType" class="tx-semibold">Select Hostel <span class="text-danger">*</span></label>
                                    <select class="form-select d-block w-100 select2" name="hostel_id" id="hostelType" required>
                                        <option value="">Choose...</option>
                                        @foreach($hostels as $hostel)
                                        <option value="{{ $hostel->id }}" {{ old('hostel_id', isset($user) ? $user->subadmin->hostel_id : null) == $hostel->id ? 'selected' : '' }}>{{ $hostel->name }} ({{$hostel->short_code}})</option>
                                        @endforeach
                                    </select>
                                    @error('hostel_id')
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
                                    <button type="submit" class="btn ripple btn-secondary-transparent btn-block btn-md">{{ isset($user) ? 'Update' : 'Create' }} Subadmin</button>
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