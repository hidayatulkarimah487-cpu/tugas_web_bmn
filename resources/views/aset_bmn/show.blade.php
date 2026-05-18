@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Detail Aset BMN</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="250">Kode Aset BMN</th>
                <td>{{ $aset_bmn->kode_aset }}</td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td>{{ $aset_bmn->nama_barang }}</td>
            </tr>
            <tr>
                <th>Kategori Barang</th>
                <td>{{ $aset_bmn->kategori_barang }}</td>
            </tr>
            <tr>
                <th>Lokasi Ruangan</th>
                <td>{{ $aset_bmn->lokasi_ruangan }}</td>
            </tr>
            <tr>
                <th>Tahun Perolehan</th>
                <td>{{ $aset_bmn->tahun_perolehan }}</td>
            </tr>
            <tr>
                <th>Kondisi</th>
                <td>{{ $aset_bmn->kondisi }}</td>
            </tr>
        </table>

        <a href="{{ route('aset-bmn.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('aset-bmn.edit', $aset_bmn->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection