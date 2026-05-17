@extends('layouts.app')

@section('content')

<h2 class="mb-4">Tambah Data BMN</h2>

<form action="{{ route('aset_bmn.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Kode Aset</label>
        <input type="text"
            name="kode_aset"
            class="form-control"
            value="{{ old('kode_aset') }}">

        @error('kode_aset')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text"
            name="nama_barang"
            class="form-control"
            value="{{ old('nama_barang') }}">

        @error('nama_barang')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori" class="form-control">
            <option value="Mebel">Mebel</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Kendaraan">Kendaraan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Perolehan</label>
        <input type="number" name="tahun_perolehan" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kondisi</label>
        <select name="kondisi" class="form-control">
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

    <a href="/" class="btn btn-secondary">
        Kembali
    </a>

</form>

@endsection