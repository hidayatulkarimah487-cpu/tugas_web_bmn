@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Aset BMN</h4>
        <a href="{{ route('aset-bmn.create') }}" class="btn btn-primary">
            + Tambah Aset
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Kode Aset</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Tahun</th>
                        <th>Kondisi</th>
                        <th width="190">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aset as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_aset }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kategori_barang }}</td>
                            <td>{{ $item->lokasi_ruangan }}</td>
                            <td>{{ $item->tahun_perolehan }}</td>
                            <td>
                                @if ($item->kondisi == 'Baik')
                                    <span class="badge bg-success">{{ $item->kondisi }}</span>
                                @elseif ($item->kondisi == 'Rusak Ringan')
                                    <span class="badge bg-warning text-dark">{{ $item->kondisi }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $item->kondisi }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('aset-bmn.show', $item->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                                <a href="{{ route('aset-bmn.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('aset-bmn.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data aset BMN.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $aset->links() }}
    </div>
</div>
@endsection