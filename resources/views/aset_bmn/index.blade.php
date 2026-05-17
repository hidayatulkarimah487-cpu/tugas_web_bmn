@extends('layouts.app')

@section('content')

<h2 class="mb-4">Data Inventaris BMN</h2>

<a href="{{ route('aset_bmn.create') }}" class="btn btn-primary mb-3">
    Tambah Data
</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Tahun</th>
            <th>Kondisi</th>
        </tr>
    </thead>

   <tbody>

        @foreach ($asetBmns as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kode_aset }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->kategori }}</td>
            <td>{{ $item->lokasi }}</td>
            <td>{{ $item->tahun_perolehan }}</td>
            <td>{{ $item->kondisi }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection