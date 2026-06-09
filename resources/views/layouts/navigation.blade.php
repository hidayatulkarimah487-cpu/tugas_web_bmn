<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('aset-bmn.index') }}">
            Sistem Inventarisasi Aset BMN
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('aset-bmn.index') }}">

                        Data Aset

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('ruangan.index') }}">

                        Master Ruangan

                    </a>

                </li>

            </ul>

            @auth

            <span class="navbar-text me-3">

                {{ Auth::user()->name }}

            </span>

            <form
                action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="btn btn-danger btn-sm">

                    Logout

                </button>

            </form>

            @endauth

        </div>

    </div>

</nav>