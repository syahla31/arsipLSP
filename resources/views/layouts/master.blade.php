<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords"
            content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

        <title>Arsip Surat</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

        <!-- CSRF Token -->
        <meta name="_token" content="{{ csrf_token() }}">

        <!-- ========== CSS LOAD ORDER FIXED ========== -->

        <!-- ✅ 1. TAILWIND CSS DULU -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- ✅ 2. FONTS & PLUGIN CSS -->
        <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />

        <!-- ✅ 3. COMMON CSS (app.css) -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

        <!-- Optional: Bootstrap (kalau masih perlu) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Optional: Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('plugin-styles')
        @stack('style')
    </head>

    <body data-base-url="{{ url('/') }}">

        <script src="{{ asset('assets/js/spinner.js') }}"></script>

        <div class="main-wrapper" id="app">
            @include('layouts.sidebar')
            <div class="page-wrapper">
                @include('layouts.header')

                <div class="page-content">
                    @yield('content')
                </div>

                @include('layouts.footer')
            </div>
        </div>

        <!-- base js -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <!-- common js -->
        <script src="{{ asset('assets/js/template.js') }}"></script>

        @stack('plugin-scripts')
        @stack('custom-scripts')
    </body>
</html>
