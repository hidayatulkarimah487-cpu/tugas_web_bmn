@extends('layouts.app')

@section('content')
@php
    $statusClass = match ($aset_bmn->kondisi) {
        'Baik' => 'status-good',
        'Rusak Ringan' => 'status-light',
        default => 'status-heavy',
    };
@endphp

<div class="hero-card mb-4">
    <div class="row align-items-center g-4 position-relative" style="z-index: 1;">
        <div class="col-lg-8">
            <span class="badge rounded-pill text-bg-info mb-3 px-3 py-2 text-dark">
                <i class="bi bi-eye me-1"></i> Detail Aset
            </span>

            <h1 class="hero-title">{{ $aset_bmn->nama_barang }}</h1>

            <p class="hero-subtitle">
                Informasi lengkap aset dengan kode <strong>{{ $aset_bmn->kode_aset }}</strong>.
            </p>
        </div>

        <div class="col-lg-4 text-lg-end">
            <span class="badge-status {{ $statusClass }} fs-6">
                {{ $aset_bmn->kondisi }}
            </span>
        </div>
    </div>
</div>

<div class="detail-card">
    <div class="card-topbar">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h4 class="fw-bold mb-1">Rincian Data Aset</h4>
                <p class="text-muted mb-0">
                    Detail identitas, foto, lokasi, tahun perolehan, dan kondisi barang.
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('aset-bmn.index') }}" class="btn btn-soft">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('aset-bmn.edit', $aset_bmn->id) }}" class="btn btn-main">
                        <i class="bi bi-pencil-square me-1"></i> Edit
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="card-body-custom">
        <div class="row g-4 align-items-start">

            {{-- Kolom Foto --}}
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 text-center border">
                    <div class="mb-3">
                        <span class="badge rounded-pill text-bg-primary px-3 py-2">
                            <i class="bi bi-image me-1"></i> Foto Fisik Aset
                        </span>
                    </div>

                    @if($aset_bmn->foto_aset)
                        <img
                            src="{{ asset('storage/' . $aset_bmn->foto_aset) }}"
                            alt="Foto {{ $aset_bmn->nama_barang }}"
                            class="img-fluid rounded-4 shadow-sm border"
                            style="width: 100%; max-height: 280px; object-fit: cover;">
                    @else
                        <div class="d-flex flex-column align-items-center justify-content-center border rounded-4 bg-light"
                             style="height: 240px;">
                            <i class="bi bi-image fs-1 text-muted mb-2"></i>
                            <p class="text-muted mb-0">Tidak ada foto</p>
                        </div>
                    @endif

                    <div class="mt-3">
                        <h5 class="fw-bold mb-1">{{ $aset_bmn->nama_barang }}</h5>
                        <p class="text-muted mb-0">{{ $aset_bmn->kode_aset }}</p>
                    </div>
                </div>
            </div>

            {{-- Kolom Detail --}}
            <div class="col-lg-8">
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm border h-100">
                            <div class="text-muted small mb-1">
                                <i class="bi bi-upc-scan me-1 text-primary"></i> Kode Aset BMN
                            </div>
                            <div class="fw-bold fs-5 text-primary">
                                {{ $aset_bmn->kode_aset }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm border h-100">
                            <div class="text-muted small mb-1">
                                <i class="bi bi-box-seam me-1 text-primary"></i> Nama Barang
                            </div>
                            <div class="fw-bold fs-5">
                                {{ $aset_bmn->nama_barang }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm border h-100">
                            <div class="text-muted small mb-1">
                                <i class="bi bi-tags me-1 text-primary"></i> Kategori Barang
                            </div>
                            <div>
                                <span class="badge-category">
                                    {{ $aset_bmn->kategori_barang }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm border h-100">
                            <div class="text-muted small mb-1">
                                <i class="bi bi-geo-alt me-1 text-primary"></i> Lokasi Ruangan
                            </div>
                            <div class="fw-bold">
                                {{ $aset_bmn->lokasi_ruangan ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm border h-100">
                            <div class="text-muted small mb-1">
                                <i class="bi bi-calendar3 me-1 text-primary"></i> Tahun Perolehan
                            </div>
                            <div class="fw-bold fs-5">
                                {{ $aset_bmn->tahun_perolehan }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm border h-100">
                            <div class="text-muted small mb-1">
                                <i class="bi bi-activity me-1 text-primary"></i> Kondisi
                            </div>
                            <div>
                                <span class="badge-status {{ $statusClass }}">
                                    {{ $aset_bmn->kondisi }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection