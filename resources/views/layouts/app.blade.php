<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panjaang</title>
    <link rel="shortcut icon" href="{{ asset('imgs/logo-01.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/panjaang.css') }}">
    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        const weburl = "{{ url('/') }}";
    </script>
</head>
<body>
    @include('layouts.navbar')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div style="height: 80px; background-color: #d6d6d6;">&nbsp;</div>
    @include('layouts.footer')
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- bootstrap js cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const apiurl = "{{ url('/api/v0') }}";
    </script>
    @yield('scriptes')
</body>
</html>