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

        <a href="{{ route('aset-bmn.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

<div class="content-card">

    <div class="card-body-custom">

        <form
            action="{{ route('aset-bmn.update',$aset_bmn->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Kode Aset</label>

                    <input
                        type="text"
                        name="kode_aset"
                        class="form-control"
                        value="{{ old('kode_aset',$aset_bmn->kode_aset) }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Nama Barang</label>

                    <input
                        type="text"
                        name="nama_barang"
                        class="form-control"
                        value="{{ old('nama_barang',$aset_bmn->nama_barang) }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Kategori Barang</label>

                    <select
                        name="kategori_barang"
                        class="form-select">

                        <option value="Mebel"
                            {{ $aset_bmn->kategori_barang=="Mebel" ? "selected":"" }}>

                            Mebel

                        </option>

                        <option value="Elektronik"
                            {{ $aset_bmn->kategori_barang=="Elektronik" ? "selected":"" }}>

                            Elektronik

                        </option>

                        <option value="Kendaraan"
                            {{ $aset_bmn->kategori_barang=="Kendaraan" ? "selected":"" }}>

                            Kendaraan

                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Lokasi Ruangan</label>

                    <select
                        name="ruangan_id"
                        class="form-select">

                        @foreach($ruangan as $r)

                            <option
                                value="{{ $r->id }}"

                                {{ $aset_bmn->ruangan_id==$r->id ? 'selected':'' }}>

                                {{ $r->nama_ruangan }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Tahun Perolehan</label>

                    <input
                        type="number"
                        name="tahun_perolehan"
                        class="form-control"
                        value="{{ old('tahun_perolehan',$aset_bmn->tahun_perolehan) }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Kondisi</label>

                    <select
                        name="kondisi"
                        class="form-select">

                        <option
                            value="Baik"
                            {{ $aset_bmn->kondisi=="Baik" ? "selected":"" }}>

                            Baik

                        </option>

                        <option
                            value="Rusak Ringan"
                            {{ $aset_bmn->kondisi=="Rusak Ringan" ? "selected":"" }}>

                            Rusak Ringan

                        </option>

                        <option
                            value="Rusak Berat"
                            {{ $aset_bmn->kondisi=="Rusak Berat" ? "selected":"" }}>

                            Rusak Berat

                        </option>

                    </select>

                </div>

                <div class="col-md-12 mb-3">

                    <label>Foto Lama</label>

                    <br>

                    @if($aset_bmn->foto_aset)

                        <img
                            src="{{ asset('storage/'.$aset_bmn->foto_aset) }}"
                            width="180"
                            class="img-thumbnail">

                    @else

                        Tidak ada foto

                    @endif

                </div>

                <div class="col-md-12 mb-3">

                    <label>Ganti Foto</label>

                    <input
                        type="file"
                        name="foto_aset"
                        class="form-control">

                </div>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Update

            </button>

        </form>

    </div>

</div>

@endsection