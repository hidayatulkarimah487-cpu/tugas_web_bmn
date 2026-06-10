@extends('layouts.app')

@section('content')

<div class="hero-card mb-4">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2 class="hero-title">
                Edit Data Aset BMN
            </h2>

            <p class="hero-subtitle">
                Perbarui data aset BMN.
            </p>
        </div>

        <a href="{{ route('aset-bmn.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

<div class="content-card">

    <div class="card-body-custom">

        <form
            action="{{ route('aset-bmn.update', $aset_bmn->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- Kode Aset --}}
                <div class="col-md-6 mb-3">
                    <label>Kode Aset</label>

                    <input
                        type="text"
                        name="kode_aset"
                        class="form-control @error('kode_aset') is-invalid @enderror"
                        value="{{ old('kode_aset', $aset_bmn->kode_aset) }}">

                    @error('kode_aset')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama Barang --}}
                <div class="col-md-6 mb-3">
                    <label>Nama Barang</label>

                    <input
                        type="text"
                        name="nama_barang"
                        class="form-control @error('nama_barang') is-invalid @enderror"
                        value="{{ old('nama_barang', $aset_bmn->nama_barang) }}">

                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="col-md-6 mb-3">
                    <label>Kategori Barang</label>

                    <select
                        name="kategori_barang"
                        class="form-select @error('kategori_barang') is-invalid @enderror">

                        <option value="Mebel"
                            {{ old('kategori_barang', $aset_bmn->kategori_barang) == 'Mebel' ? 'selected' : '' }}>
                            Mebel
                        </option>

                        <option value="Elektronik"
                            {{ old('kategori_barang', $aset_bmn->kategori_barang) == 'Elektronik' ? 'selected' : '' }}>
                            Elektronik
                        </option>

                        <option value="Kendaraan"
                            {{ old('kategori_barang', $aset_bmn->kategori_barang) == 'Kendaraan' ? 'selected' : '' }}>
                            Kendaraan
                        </option>

                    </select>

                    @error('kategori_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Lokasi Ruangan --}}
                <div class="col-md-6 mb-3">
                    <label>Lokasi Ruangan</label>

                    <input
                        type="text"
                        name="lokasi_ruangan"
                        class="form-control @error('lokasi_ruangan') is-invalid @enderror"
                        value="{{ old('lokasi_ruangan', $aset_bmn->lokasi_ruangan) }}"
                        placeholder="Contoh: Ruang Admin">

                    @error('lokasi_ruangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tahun --}}
                <div class="col-md-6 mb-3">
                    <label>Tahun Perolehan</label>

                    <input
                        type="number"
                        name="tahun_perolehan"
                        class="form-control @error('tahun_perolehan') is-invalid @enderror"
                        value="{{ old('tahun_perolehan', $aset_bmn->tahun_perolehan) }}">

                    @error('tahun_perolehan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kondisi --}}
                <div class="col-md-6 mb-3">
                    <label>Kondisi</label>

                    <select
                        name="kondisi"
                        class="form-select @error('kondisi') is-invalid @enderror">

                        <option
                            value="Baik"
                            {{ old('kondisi', $aset_bmn->kondisi) == 'Baik' ? 'selected' : '' }}>
                            Baik
                        </option>

                        <option
                            value="Rusak Ringan"
                            {{ old('kondisi', $aset_bmn->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>
                            Rusak Ringan
                        </option>

                        <option
                            value="Rusak Berat"
                            {{ old('kondisi', $aset_bmn->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>
                            Rusak Berat
                        </option>

                    </select>

                    @error('kondisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Foto Lama --}}
                <div class="col-md-12 mb-3">
                    <label>Foto Lama</label>

                    <br>

                    @if($aset_bmn->foto_aset)

                        <img
                            src="{{ asset('storage/' . $aset_bmn->foto_aset) }}"
                            width="180"
                            class="img-thumbnail">

                    @else

                        <p class="text-muted mb-0">
                            Tidak ada foto
                        </p>

                    @endif
                </div>

                {{-- Ganti Foto --}}
                <div class="col-md-12 mb-3">
                    <label>Ganti Foto</label>

                    <input
                        type="file"
                        name="foto_aset"
                        class="form-control @error('foto_aset') is-invalid @enderror"
                        accept="image/*">

                    @error('foto_aset')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </form>

    </div>

</div>

@endsection