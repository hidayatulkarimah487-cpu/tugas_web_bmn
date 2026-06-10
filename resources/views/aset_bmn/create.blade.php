@extends('layouts.app')

@section('content')
<div class="hero-card mb-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 position-relative" style="z-index: 1;">
        <div>
            <span class="badge rounded-pill text-bg-success mb-3 px-3 py-2">
                <i class="bi bi-plus-circle me-1"></i> Tambah Data
            </span>

            <h1 class="hero-title">Tambah Data Aset BMN</h1>

            <p class="hero-subtitle">
                Masukkan data aset baru secara lengkap agar inventaris lebih rapi dan mudah dipantau.
            </p>
        </div>

        <a href="{{ route('aset-bmn.index') }}" class="btn btn-soft">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="form-card">
    <div class="card-topbar">
        <h4 class="fw-bold mb-1">Form Tambah Aset</h4>
        <p class="text-muted mb-0">
            Pastikan kode aset tidak sama dengan data lain.
        </p>
    </div>

    <div class="card-body-custom">

        <form action="{{ route('aset-bmn.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row g-4">

                {{-- Kode Aset --}}
                <div class="col-md-6">
                    <label class="form-label">Kode Aset BMN</label>

                    <input
                        type="text"
                        name="kode_aset"
                        class="form-control @error('kode_aset') is-invalid @enderror"
                        value="{{ old('kode_aset') }}"
                        placeholder="Contoh: BMN-001">

                    @error('kode_aset')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama Barang --}}
                <div class="col-md-6">
                    <label class="form-label">Nama Barang</label>

                    <input
                        type="text"
                        name="nama_barang"
                        class="form-control @error('nama_barang') is-invalid @enderror"
                        value="{{ old('nama_barang') }}"
                        placeholder="Contoh: Meja Kerja">

                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="col-md-6">
                    <label class="form-label">Kategori Barang</label>

                    <select
                        name="kategori_barang"
                        class="form-select @error('kategori_barang') is-invalid @enderror">

                        <option value="">-- Pilih Kategori --</option>

                        <option value="Mebel"
                            {{ old('kategori_barang') == 'Mebel' ? 'selected' : '' }}>
                            Mebel
                        </option>

                        <option value="Elektronik"
                            {{ old('kategori_barang') == 'Elektronik' ? 'selected' : '' }}>
                            Elektronik
                        </option>

                        <option value="Kendaraan"
                            {{ old('kategori_barang') == 'Kendaraan' ? 'selected' : '' }}>
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
                <div class="col-md-6">
                    <label class="form-label">Lokasi Ruangan</label>

                    <input
                        type="text"
                        name="lokasi_ruangan"
                        class="form-control @error('lokasi_ruangan') is-invalid @enderror"
                        value="{{ old('lokasi_ruangan') }}"
                        placeholder="Contoh: Ruang Admin">

                    @error('lokasi_ruangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tahun --}}
                <div class="col-md-6">
                    <label class="form-label">Tahun Perolehan</label>

                    <input
                        type="number"
                        name="tahun_perolehan"
                        class="form-control @error('tahun_perolehan') is-invalid @enderror"
                        value="{{ old('tahun_perolehan') }}"
                        placeholder="Contoh: 2025">

                    @error('tahun_perolehan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Kondisi --}}
                <div class="col-md-6">
                    <label class="form-label">Kondisi</label>

                    <select
                        name="kondisi"
                        class="form-select @error('kondisi') is-invalid @enderror">

                        <option value="">-- Pilih Kondisi --</option>

                        <option value="Baik"
                            {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>
                            Baik
                        </option>

                        <option value="Rusak Ringan"
                            {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>
                            Rusak Ringan
                        </option>

                        <option value="Rusak Berat"
                            {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>
                            Rusak Berat
                        </option>
                    </select>

                    @error('kondisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="col-md-12">
                    <label class="form-label">Foto Fisik Aset</label>

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

            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                <a href="{{ route('aset-bmn.index') }}" class="btn btn-soft">
                    <i class="bi bi-x-circle me-1"></i>
                    Batal
                </a>

                <button type="submit" class="btn btn-main">
                    <i class="bi bi-save me-1"></i>
                    Simpan Data
                </button>

            </div>

        </form>

    </div>
</div>
@endsection