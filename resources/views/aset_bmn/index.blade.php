@extends('layouts.app')

@section('content')

<div class="p-4 mb-4 rounded-4 text-white shadow-sm"
style="background: linear-gradient(135deg,#2563eb,#1e40af);">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2 class="fw-bold mb-2">
                Sistem Inventarisasi Aset BMN
            </h2>

            <p class="mb-2 opacity-75">
                Kelola data inventaris Barang Milik Negara Fakultas Teknologi Informasi
            </p>

            <hr class="border-light opacity-25"
            style="width:85%">
        </div>

        <div style="font-size:75px;">
            📦
        </div>

    </div>

</div>


<div class="card shadow border-0 rounded-4">

<div class="card-header bg-white d-flex justify-content-between align-items-center py-4">

<h3 class="mb-0 fw-bold">
Data Aset BMN
</h3>

<a href="{{ route('aset-bmn.create') }}"
class="btn btn-primary rounded-pill px-4">

+ Tambah Aset

</a>

</div>


<div class="card-body">

<div class="table-responsive">

<table class="table table-hover align-middle">

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

<td>
{{ $aset->firstItem()+$loop->index }}
</td>

<td>
{{ $item->kode_aset }}
</td>

<td class="fw-semibold">
{{ $item->nama_barang }}
</td>

<td>
{{ $item->kategori_barang }}
</td>

<td>
{{ $item->lokasi_ruangan }}
</td>

<td>
{{ $item->tahun_perolehan }}
</td>

<td>

@if ($item->kondisi == 'Baik')

<span class="badge bg-success rounded-pill px-3">
{{ $item->kondisi }}
</span>

@elseif($item->kondisi == 'Rusak Ringan')

<span class="badge bg-warning text-dark rounded-pill px-3">
{{ $item->kondisi }}
</span>

@else

<span class="badge bg-danger rounded-pill px-3">
{{ $item->kondisi }}
</span>

@endif

</td>

<td>

<a href="{{ route('aset-bmn.show',$item->id) }}"
class="btn btn-info btn-sm">

Detail

</a>


<a href="{{ route('aset-bmn.edit',$item->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>


<form
action="{{ route('aset-bmn.destroy',$item->id) }}"
method="POST"
class="d-inline"
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

<td colspan="8"
class="text-center py-4">

Belum ada data aset BMN.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>


<div class="mt-4 text-center">

{{ $aset->links('pagination::bootstrap-5') }}

<div class="mt-3 text-muted">

Showing

{{ $aset->firstItem() }}

to

{{ $aset->lastItem() }}

of

{{ $aset->total() }}

results

</div>

</div>


</div>

</div>

@endsection