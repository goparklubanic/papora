<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Simonev') }}</title>
    <link rel="shortcut icon" href="{{ asset('imgs/logo-01.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/panjaang.css') }}">
    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script>
        const weburl = "{{ url('/') }}";
    </script>
</head>
<body>
    <div class="container-fluid">
        {{-- header --}}
        <div class="row">
            <div class="col-12 px-0">
                @include('layouts.navbar-min')
            </div>
        </div>
        {{-- content --}}
        <div class="row" id="app-row">
            {{-- sidebar --}}
            <div id="app-sidebar">
                @include('layouts.wd-sidebar')
            </div>
            {{-- content --}}
            <div id="app-content">
                @yield('content')
            </div>
        </div>
        <div id="footer-spacer">&nbsp;</div>
        {{-- footer --}}
        <div class="row">
            <div class="col-12">
                @include('layouts.footer')
            </div>
        </div>
    </div>
    {{-- bootstrap js cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        const apiurl = "{{ url('/api/v0') }}";
    </script>
    @yield('scriptes')
    <script>
        const toggleBtn = document.getElementById('menu-btn')
        const sidebar = document.getElementById('app-sidebar')
        const toggleNav = document.getElementById('nav-toggler')
        toggleBtn.addEventListener('click',()=>{
                if (sidebar.style.display === 'block') {
                    sidebar.style.display = 'none'; // Hide it
                    toggleNav.click();
                } else {
                    sidebar.style.display = 'block'; // Show it
                    toggleNav.click();
                }
            }
        )
    </script>
</body>
</html>