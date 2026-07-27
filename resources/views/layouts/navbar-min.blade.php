{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> --}}
<nav class="navbar navbar-expand-lg" style="background-color: #120079;" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Simonev') }}
        </a>
        <button class="navbar-toggler" id='nav-toggler' type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link nav-white " href="{{ url('/renstra/jelajah') }}">Renstra</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link nav-white" id="menu-btn" href="#">Menu</a>
                </li>

                
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link nav-white  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rekap
                    </a>
                    @php
                        $tahun = date('Y');
                    @endphp
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a target="_blank" class="dropdown-item nav-white" href="{{ route("renstra.allsk",$tahun) }}">Sub Kegiatan {{ $tahun }}</a></li>
                        <li><a target="_blank" class="dropdown-item nav-white" href="{{ route("renstra.allkg",$tahun) }}">Kegiatan {{ $tahun }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a target="_blank" class="dropdown-item nav-white" href="{{ route("renstra.allpg",$tahun) }}">Program {{ $tahun }}</a></li>
                        <li><a target="_blank" class="dropdown-item nav-white" href="{{ route("renstra.allss",$tahun) }}">Sasaran {{ $tahun }}</a></li>
                    </ul>
                </li> --}}
            </ul>
            @if (!Auth::check())
            <form class="d-flex" action="{{ url('/login') }}" method="POST">
                @csrf
                <input class="form-control form-control-sm me-2" type="email" name="email" placeholder="Email" aria-label="Email" required value='walidata@dindik.bna'>
                <input class="form-control form-control-sm me-2" type="password" name="password" placeholder="Password" aria-label="Password" required value='Wali@123'>
                <button class="btn btn-sm btn-primary btn-outline-white" type="submit">Login</button>
            </form>
            @else
            {{-- Display Username --}}
            <span class="text-white me-2">{{ Auth::user()->name }}</span>
            <a href="{{ url('/logout') }}" class="btn btn-sm btn-primary btn-outline-white">Logout</a>
            @endif
        </div>
    </div>
</nav>
