<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.ico') }}" type="image/x-icon" />
    <title>{{ config('app.name', 'Laravel') }} :: @yield('title')</title>
    <link id="style" rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-fonts/icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-fonts/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web-fonts/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
</head>

<body>
    <div class="main-body leftmenu ltr light-theme">
        <div id="global-loader">
            <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
        </div>

        <div class="page main-signin-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-show-password.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>