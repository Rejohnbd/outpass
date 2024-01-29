<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.ico') }}" type="image/x-icon" />
    <title>{{ config('app.name', 'Laravel') }} :: Checkout</title>
    <link id="style" rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-fonts/icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web-fonts/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web-fonts/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
</head>

<body>
    <div class="main-body leftmenu ltr light-theme">
        <div class="page main-signin-wrapper construction">
            <div id="app">
                <outpass-component />
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>