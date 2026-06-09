@extends('layouts.app')
@section('content')
<div class="container">
    <h2>
        Tambah Ruangan
    </h2>
    <form
        action="{{ route('ruangan.store') }}"
        method="POST">
        @csrf

        <div class="mb-3">
            <label>
                Nama Ruangan
            </label>
            <input
                type="text"
                name="nama_ruangan"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>
                Gedung
            </label>
            <input
                type="text"
                name="gedung"
                class="form-control">
        </div>

        <div class="mb-3">
            <label>
                Penanggung Jawab
            </label>
            <input
                type="text"
                name="penanggung_jawab"
                class="form-control">
        </div>
        <button
            class="btn btn-primary">
            Simpan
        </button>
    </form>
</div>
@endsection