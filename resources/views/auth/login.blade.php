<x-guest-layout>

<div class="text-center mb-4">
    <i class="bi bi-building-fill text-primary" style="font-size:60px;"></i>

    <h2 class="fw-bold mt-3">
        Login Sistem BMN
    </h2>

    <p class="text-muted">
        Sistem Inventaris Barang Milik Negara
    </p>
</div>

<x-auth-session-status class="mb-3" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label fw-semibold">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="form-control rounded-3"
            required
            autofocus>

        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"/>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="form-control rounded-3"
            required>

        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger"/>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="remember">

            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"
                class="text-decoration-none">
                Lupa Password?
            </a>
        @endif

    </div>

    <button class="btn btn-primary w-100 rounded-3 py-2">
        Login
    </button>

</form>

<div class="text-center mt-4">

    Belum punya akun?

    <a href="{{ route('register') }}"
        class="text-decoration-none fw-semibold">

        Daftar

    </a>

</div>

</x-guest-layout>