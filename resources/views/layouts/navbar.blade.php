{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> --}}
<nav class="navbar navbar-expand-lg" style="background-color: #120079;" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Judul Aplikasi') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-white " href="{{ url('/renstra/jelajah') }}">Renstra</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link nav-white " href="#">Menu-2</a>
                </li> --}}

                
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link nav-white  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu-4
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item nav-white" href="#">Menu 4-1</a></li>
                        <li><a class="dropdown-item nav-white" href="#">Menu 4-2</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item nav-white" href="#">Menu 4-3</a></li>
                    </ul>
                </li> --}}
            </ul>
            <form class="d-flex" action="#" method="POST">
                @csrf
                <input class="form-control me-2" type="email" name="email" placeholder="Email" aria-label="Email" required>
                <input class="form-control me-2" type="password" name="password" placeholder="Password" aria-label="Password" required>
                <button class="btn btn-outline-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
</nav>
