@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Data Ruangan</h2>
    <form
        action="{{ route('ruangan.update',$ruangan->id) }}"
        method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">
                Nama Ruangan
            </label>
            <input
                type="text"
                name="nama_ruangan"
                class="form-control"
                value="{{ old('nama_ruangan',$ruangan->nama_ruangan) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">
                Gedung
            </label>
            <input
                type="text"
                name="gedung"
                class="form-control"
                value="{{ old('gedung',$ruangan->gedung) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">
                Penanggung Jawab
            </label>
            <input
                type="text"
                name="penanggung_jawab"
                class="form-control"
                value="{{ old('penanggung_jawab',$ruangan->penanggung_jawab) }}">
        </div>
        <button
            type="submit"
            class="btn btn-primary">
            Update
        </button>
        <a
            href="{{ route('ruangan.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection