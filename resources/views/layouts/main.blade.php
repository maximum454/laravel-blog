<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
    <div id="app">
        <div class="edica-loader"></div>
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
        <script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script>
            AOS.init({
                duration: 1000
            });
        </script>
    </div>
</body>
</html>
