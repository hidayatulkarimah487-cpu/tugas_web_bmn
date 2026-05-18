@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Edit Data Aset BMN</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('aset-bmn.update', $aset_bmn->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Aset BMN</label>
                <input type="text" name="kode_aset" class="form-control @error('kode_aset') is-invalid @enderror"
                    value="{{ old('kode_aset', $aset_bmn->kode_aset) }}">
                @error('kode_aset')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"
                    value="{{ old('nama_barang', $aset_bmn->nama_barang) }}">
                @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori Barang</label>
                <select name="kategori_barang" class="form-select @error('kategori_barang') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Mebel" {{ old('kategori_barang', $aset_bmn->kategori_barang) == 'Mebel' ? 'selected' : '' }}>Mebel</option>
                    <option value="Elektronik" {{ old('kategori_barang', $aset_bmn->kategori_barang) == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="Kendaraan" {{ old('kategori_barang', $aset_bmn->kategori_barang) == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                </select>
                @error('kategori_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi Ruangan</label>
                <input type="text" name="lokasi_ruangan" class="form-control @error('lokasi_ruangan') is-invalid @enderror"
                    value="{{ old('lokasi_ruangan', $aset_bmn->lokasi_ruangan) }}">
                @error('lokasi_ruangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Perolehan</label>
                <input type="number" name="tahun_perolehan" class="form-control @error('tahun_perolehan') is-invalid @enderror"
                    value="{{ old('tahun_perolehan', $aset_bmn->tahun_perolehan) }}">
                @error('tahun_perolehan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kondisi</label>
                <select name="kondisi" class="form-select @error('kondisi') is-invalid @enderror">
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="Baik" {{ old('kondisi', $aset_bmn->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi', $aset_bmn->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi', $aset_bmn->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
                @error('kondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('aset-bmn.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection