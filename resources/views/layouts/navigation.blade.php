<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('aset-bmn.index') }}">
            Sistem Inventarisasi Aset BMN
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('aset-bmn.*') ? 'active' : '' }}"
                       href="{{ route('aset-bmn.index') }}">
                        <i class="bi bi-box-seam me-1"></i>
                        Data Aset
                    </a>
                </li>

                @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ruangan.*') ? 'active' : '' }}"
                           href="{{ route('ruangan.index') }}">
                            <i class="bi bi-building me-1"></i>
                            Master Ruangan
                        </a>
                    </li>
                @endif

            </ul>

            @auth
                <span class="navbar-text me-3">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ Auth::user()->name }}

                    @if(Auth::user()->role === 'admin')
                        <span class="badge text-bg-warning ms-2">Admin</span>
                    @else
                        <span class="badge text-bg-info ms-2 text-dark">User</span>
                    @endif
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i>
                        Logout
                    </button>
                </form>
            @endauth

        </div>

    </div>

</nav>