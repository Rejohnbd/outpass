@extends('layouts.guest')

@section('title', 'Register')

@section('content')

<div class="row signpages text-center">
    <div class="col-md-12">
        <div class="card border-0">
            <div class="row row-sm">
                <div class="col-lg-6 col-xl-6 col-xs-12 col-sm-12 login_form rounded-start-11">
                    <div class="container-fluid">
                        <div class="row row-sm">
                            <div class="card-body mt-2 mb-2">
                                <div class="mobilelogo">
                                    <img src="{{ asset('assets/img/brand/logo.png') }}" class=" d-lg-none header-brand-img text-start float-start mb-4 dark-logo" alt="logo">
                                    <img src="{{ asset('assets/img/brand/logo-light.png') }}" class=" d-lg-none header-brand-img text-start float-start mb-4 light-logo" alt="logo">
                                </div>
                                <div class="clearfix"></div>
                                <h2 class="text-start mb-2">Sign Up for Free</h2>
                                <p class="mb-4 text-muted tx-13 ms-0 text-start">It's Free to Sign up and only takes a minute.</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Name <span class="text-danger">*</span></label>
                                        <input class="form-control" autocomplete="name" name="name" placeholder="Enter your Name" value="{{ old('name') }}" type="text" required>
                                        @error('name')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" placeholder="Enter your email" type="email" autocomplete="email" value="{{ old('email') }}" name="email" required>
                                        @error('email')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Password <span class="text-danger">*</span></label>
                                        <input class="form-control border-end-0" placeholder="Enter your password" autocomplete="new-password" type="password" data-bs-toggle="password" name="password">
                                        @error('password')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-start">
                                        <label class="tx-medium">Confirm Password <span class="text-danger">*</span></label>
                                        <input class="form-control border-end-0" placeholder="Enter your password" autocomplete="new-password" type="password" data-bs-toggle="password" name="password_confirmation">
                                    </div>
                                    <div class="form-group text-start">
                                        <label class="tx-semibold">Select Hostel <span class="text-danger">*</span></label>
                                        <select class="form-select d-block w-100" name="hostel_id" required>
                                            <option value="">Select Hostel</option>
                                            @foreach ($hostels as $hostel)
                                            <option value="{{ $hostel->id }}">{{ $hostel->name }} ({{$hostel->short_code}})</option>
                                            @endforeach
                                        </select>
                                        @error('hostel_id')
                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary btn-block mg-t-10" type="submit">Create Account</button>
                                </form>
                                <div class="text-start mt-4 ms-0 mb-3">
                                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-none d-lg-block text-center bg-primary details rounded-end-11">
                    <div class="mt-4 pt-5 p-2 pos-relative">
                        <img src="{{ asset('assets/img/brand/logo-light.png') }}" class="header-brand-img mb-3 mt-3" alt="logo">
                        <div class="clearfix"></div>
                        <img src="{{ asset('assets/img/pngs/user.png') }}" class="ht-250 mb-0" alt="user">
                        <h2 class="mt-4 text-white tx-normal">Create Your Account</h2>
                        <span class="tx-white-6 tx-13 mb-5 mt-xl-0">It's Free to Sign up and only takes a minute</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
</div>

<div class="flex items-center justify-end mt-4">
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-button class="ml-4">
        {{ __('Register') }}
    </x-button>
</div>
</form> --}}
@endsection