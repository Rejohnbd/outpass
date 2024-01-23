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
    @stack('styles')
</head>

<body class="main-body leftmenu ltr light-theme dark-menu">
    @include('components.loader')
    <div class="page">
        @include('components.topbar')
        @include('components.sidebar')
        <div class="main-content side-content pt-0">
            @yield('content')
        </div>
        @include('components.footer')
    </div>

    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-show-password.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/swither-styles.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @stack('scripts')


    @if(auth()->user()->user_type == 'admin')
    <script>
        function fetchnotification() {
            $.ajax({
                url: "{{ route('admin-notification') }}",
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        $('#notificationCount').html(response.total_notification);
                        $('#notificationCountBudget').html('Notifications (' + response.total_notification + ')');
                        $('#notificationList').empty();
                        $('#notificationList').html(response.list_notification);
                    }
                }
            });
        }

        $(document).ready(function() {
            $('.reLoad').on('click', function() {
                window.location.reload();
            })
            setInterval(fetchnotification, 1000 * 60 * 0.5);
        });
    </script>
    @endif

    @if(auth()->user()->user_type == 'incharge')
    <script>
        function fetchnotification() {
            $.ajax({
                url: "{{ route('incharge-notification') }}",
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        $('#notificationCount').html(response.total_notification);
                        $('#notificationCountBudget').html('Notifications (' + response.total_notification + ')');
                        $('#notificationList').empty();
                        $('#notificationList').html(response.list_notification);
                    }
                }
            });
        }

        $(document).ready(function() {
            $('.reLoad').on('click', function() {
                window.location.reload();
            })
            setInterval(fetchnotification, 1000 * 60 * 0.5);
        });
    </script>
    @endif

    @if(auth()->user()->user_type == 'client')
    <script>
        function fetchnotification() {
            $.ajax({
                url: "{{ route('client-notification') }}",
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        $('#notificationCount').html(response.total_notification);
                        $('#notificationCountBudget').html('Notifications (' + response.total_notification + ')');
                        $('#notificationList').empty();
                        $('#notificationList').html(response.list_notification);
                    }
                }
            });
        }
        $(document).ready(function() {
            $('.clearNotifi').on('click', function() {
                let outpassId = $(this).data('id');
                $.ajax({
                    type: "post",
                    url: "{{ route('client-notification-clear') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        outpass_id: outpassId
                    },
                    success: function(response) {
                        if (response.status) {
                            fetchnotification();
                        }
                    }
                });
            });
            setInterval(fetchnotification, 1000 * 60 * 1);
        });
    </script>
    @endif
</body>

</html>