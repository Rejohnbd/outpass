@extends('layouts.guest')

@section('title', 'Login')

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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <h2 class=" text-start mb-2">Sign In</h2>
                                    <p class="mb-4 text-muted tx-13 ms-0 text-start">Sign in to Create, Discover and Connect with the Global Community</p>
                                    <div class="panel desc-tabs border-0 p-0">
                                        <div class="panel-body tabs-menu-body mt-2">
                                            <div class="tab-pane active" id="tab01">
                                                <div class="form-group text-start">
                                                    <label class="tx-medium">Email</label>
                                                    <input class="form-control" placeholder="Enter your email" type="email" name="email" autocomplete="email">
                                                    @error('email')
                                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group text-start">
                                                    <label class="tx-medium">Password</label>
                                                    <input class="form-control border-end-0" placeholder="Enter your password" type="password" name="password" autocomplete="new-password" data-bs-toggle="password">
                                                    @error('password')
                                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-start mt-4 ms-0 mb-3">
                                    <div class="mb-1"><a href="forgot.html">Forgot password?</a></div>
                                    <div>Don't have an account? <a href="signup.html">Register Here</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-none d-lg-block text-center bg-primary details rounded-end-11">
                    <div class="mt-4 pt-4 p-2 pos-relative">
                        <img src="{{ asset('assets/img/brand/logo-light.png') }}" class="header-brand-img mb-3 mt-3" alt="logo">
                        <div class="clearfix"></div>
                        <img src="{{ asset('assets/img/pngs/user.png') }}" class="ht-250 mb-0" alt="user">
                        <h2 class="mt-4 text-white tx-normal">Sign In Your Account</h2>
                        <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Sign in to Create, Discover and Connect with the Global Community</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <form method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Address -->
<div>
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
</div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-button class="ml-3">
        {{ __('Log in') }}
    </x-button>
</div>
</form> --}}
@endsection