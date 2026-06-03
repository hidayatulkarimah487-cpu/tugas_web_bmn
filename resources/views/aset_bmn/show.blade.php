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
                <p class="text-muted mb-0">Detail identitas, lokasi, dan kondisi barang.</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('aset-bmn.index') }}" class="btn btn-soft">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>

                <a href="{{ route('aset-bmn.edit', $aset_bmn->id) }}" class="btn btn-main">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <div class="card-body-custom">
        <div class="detail-list">
            <div class="detail-item">
                <div class="detail-label">
                    <i class="bi bi-upc-scan me-2 text-primary"></i> Kode Aset BMN
                </div>
                <div class="detail-value">
                    <span class="asset-code">{{ $aset_bmn->kode_aset }}</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">
                    <i class="bi bi-box-seam me-2 text-primary"></i> Nama Barang
                </div>
                <div class="detail-value">
                    {{ $aset_bmn->nama_barang }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">
                    <i class="bi bi-tags me-2 text-primary"></i> Kategori Barang
                </div>
                <div class="detail-value">
                    <span class="badge-category">{{ $aset_bmn->kategori_barang }}</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">
                    <i class="bi bi-geo-alt me-2 text-primary"></i> Lokasi Ruangan
                </div>
                <div class="detail-value">
                    {{ $aset_bmn->lokasi_ruangan }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">
                    <i class="bi bi-calendar3 me-2 text-primary"></i> Tahun Perolehan
                </div>
                <div class="detail-value">
                    {{ $aset_bmn->tahun_perolehan }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">
                    <i class="bi bi-activity me-2 text-primary"></i> Kondisi
                </div>
                <div class="detail-value">
                    <span class="badge-status {{ $statusClass }}">
                        {{ $aset_bmn->kondisi }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection