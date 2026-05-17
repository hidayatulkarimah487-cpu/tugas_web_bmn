@extends('layouts.app')

@section('content')

<h2 class="mb-4">Data Inventaris BMN</h2>

<a href="#" class="btn btn-primary mb-3">
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
        <tr>
            <td>1</td>
            <td>BMN-001</td>
            <td>Laptop</td>
            <td>Elektronik</td>
            <td>Lab Komputer</td>
            <td>2024</td>
            <td>Baik</td>
        </tr>
    </tbody>
</table>

@endsection