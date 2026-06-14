<x-guest-layout>

<div class="text-center mb-4">

    <i class="bi bi-person-plus-fill text-success"
        style="font-size:60px;"></i>

    <h2 class="fw-bold mt-3">
        Registrasi Akun
    </h2>

    <p class="text-muted">
        Sistem Inventaris Barang Milik Negara
    </p>

</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">

        <label class="form-label fw-semibold">
            Nama Lengkap
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="form-control rounded-3"
            required>

        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger"/>

    </div>

    <div class="mb-3">

        <label class="form-label fw-semibold">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="form-control rounded-3"
            required>

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

    <div class="mb-4">

        <label class="form-label fw-semibold">
            Konfirmasi Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="form-control rounded-3"
            required>

    </div>

    <button class="btn btn-success w-100 rounded-3 py-2">

        Daftar Sekarang

    </button>

</form>

<div class="text-center mt-4">

    Sudah punya akun?

    <a href="{{ route('login') }}"
        class="text-decoration-none fw-semibold">

        Login

    </a>

</div>

</x-guest-layout>