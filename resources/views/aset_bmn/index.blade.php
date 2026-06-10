@extends('layouts.app')

@section('content')
<div class="hero-card mb-4">
    <div class="row align-items-center g-4 position-relative" style="z-index: 1;">
        <div class="col-lg-8">
            <span class="badge rounded-pill text-bg-primary mb-3 px-3 py-2">
                <i class="bi bi-stars me-1"></i> Sistem Inventarisasi Aset BMN
            </span>

            <h1 class="hero-title">Kelola Aset BMN</h1>

            <p class="hero-subtitle">
                Website ini digunakan untuk mencatat, memantau, dan mengelola data aset BMN berdasarkan kode aset,
                kategori barang, lokasi ruangan, tahun perolehan, dan kondisi barang.
            </p>
        </div>

        <div class="col-lg-4 text-lg-end">
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('aset-bmn.create') }}" class="btn btn-main">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Aset
                </a>
            @endif
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success shadow-sm mb-4">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
    </div>
@endif

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Total Aset</p>
                    <p class="stat-number">{{ $totalAset }}</p>
                </div>

                <div class="stat-icon icon-blue">
                    <i class="bi bi-box-seam"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Kondisi Baik</p>
                    <p class="stat-number">{{ $asetBaik }}</p>
                </div>

                <div class="stat-icon icon-green">
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Rusak Ringan</p>
                    <p class="stat-number">{{ $asetRusakRingan }}</p>
                </div>

                <div class="stat-icon icon-yellow">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="stat-label">Rusak Berat</p>
                    <p class="stat-number">{{ $asetRusakBerat }}</p>
                </div>

                <div class="stat-icon icon-red">
                    <i class="bi bi-x-octagon"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-card">
    <div class="card-topbar">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h4 class="fw-bold mb-1">Daftar Data Aset</h4>
                <p class="text-muted mb-0">Cari dan filter data aset sesuai kebutuhan.</p>
            </div>
        </div>
    </div>

    <div class="card-body-custom">
        <form action="{{ route('aset-bmn.index') }}" method="GET" class="filter-box mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Cari Aset</label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Kode, nama barang, atau lokasi..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Kategori</label>

                    <select name="kategori_barang" class="form-select">
                        <option value="">Semua Kategori</option>

                        <option value="Mebel" {{ request('kategori_barang') == 'Mebel' ? 'selected' : '' }}>
                            Mebel
                        </option>

                        <option value="Elektronik" {{ request('kategori_barang') == 'Elektronik' ? 'selected' : '' }}>
                            Elektronik
                        </option>

                        <option value="Kendaraan" {{ request('kategori_barang') == 'Kendaraan' ? 'selected' : '' }}>
                            Kendaraan
                        </option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Kondisi</label>

                    <select name="kondisi" class="form-select">
                        <option value="">Semua Kondisi</option>

                        <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>
                            Baik
                        </option>

                        <option value="Rusak Ringan" {{ request('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>
                            Rusak Ringan
                        </option>

                        <option value="Rusak Berat" {{ request('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>
                            Rusak Berat
                        </option>
                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button class="btn btn-main" type="submit">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </div>
            </div>

            @if(request('search') || request('kategori_barang') || request('kondisi'))
                <div class="mt-3">
                    <a href="{{ route('aset-bmn.index') }}" class="btn btn-soft btn-sm">
                        <i class="bi bi-arrow-clockwise me-1"></i> Reset Filter
                    </a>
                </div>
            @endif
        </form>

        <div class="table-responsive">
            <table class="table table-modern align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Aset</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                        <th>Lokasi</th>
                        <th>Tahun</th>
                        <th>Kondisi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($aset as $item)
                        @php
                            $statusClass = match ($item->kondisi) {
                                'Baik' => 'status-good',
                                'Rusak Ringan' => 'status-light',
                                default => 'status-heavy',
                            };
                        @endphp

                        <tr>
                            <td>
                                {{ $loop->iteration + ($aset->currentPage() - 1) * $aset->perPage() }}
                            </td>

                            <td>
                                <span class="asset-code">
                                    {{ $item->kode_aset }}
                                </span>
                            </td>

                            <td class="fw-bold">
                                {{ $item->nama_barang }}
                            </td>

                            <td>
                                <span class="badge-category">
                                    {{ $item->kategori_barang }}
                                </span>
                            </td>

                            <td>
                                @if($item->foto_aset)
                                    <img
                                        src="{{ asset('storage/' . $item->foto_aset) }}"
                                        width="80"
                                        height="55"
                                        class="img-thumbnail"
                                        style="object-fit: cover;"
                                        alt="Foto {{ $item->nama_barang }}">
                                @else
                                    <span class="text-muted">
                                        Tidak Ada Foto
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $item->lokasi_ruangan ?? '-' }}
                            </td>

                            <td>
                                {{ $item->tahun_perolehan }}
                            </td>

                            <td>
                                <span class="badge-status {{ $statusClass }}">
                                    {{ $item->kondisi }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a
                                        href="{{ route('aset-bmn.show', $item->id) }}"
                                        class="btn btn-info btn-sm text-white"
                                        title="Detail">

                                        <i class="bi bi-eye"></i>
                                    </a>

                                    @if(auth()->user()->role === 'admin')
                                        <a
                                            href="{{ route('aset-bmn.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">

                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form
                                            action="{{ route('aset-bmn.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Hapus">

                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted"></i>

                                    <h5 class="fw-bold mt-3">Data aset belum tersedia</h5>

                                    <p class="text-muted">
                                        Silakan tambahkan data aset terlebih dahulu.
                                    </p>

                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('aset-bmn.create') }}" class="btn btn-main">
                                            <i class="bi bi-plus-circle me-1"></i> Tambah Aset
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $aset->links() }}
        </div>
    </div>
</div>
@endsection